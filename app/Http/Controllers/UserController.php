<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\tempSave;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Assign;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $students = [];
        $student1 = $request->student_1;
        if(isset($student1['modules']))$student1['modules'] = join("|", $student1['modules']);
        else $student1['modules'] = ' ';
        $students[] = User::create($student1);
        // Checkt het of het geen afstudeer aanmeldformulier is
        if (!$request->graduate) {
            $student2 = $request->student_2;
            if(isset($student2['modules']))$student2['modules'] = join("|", $student2['modules']);
            else $student2['modules'] = ' ';
            $students[] = User::create($student2);
        }

        //Assignment
        $ass = new Assignment();
        $ass->student1()->associate($students[0]);
        // Checkt of er een tweede student is
        if (isset($students[1])) $ass->student2()->associate($students[1]);
        $ass->draft = $request->submit == 'temp';
        $ass->graduate = !!$request->graduate;

        //Competences
        $ass->analyse_level = $request->analyseren;
        $ass->advise_level = $request->adviseren;
        $ass->design_level = $request->ontwerpen;
        $ass->build_level = $request->realiseren;
        $ass->manage_level = $request->manage;
        $ass->save();
        
        //Questions
        foreach ($request->questions as $question_id => $answer) {
            Answer::create([
                'answer' => $answer,
                'question_id' => $question_id,
                'assignment_id' => $ass->id
            ]);
        }


        //Mail handling
        if ($request->submit == 'temp') {
            $ass->edit_key = Str::uuid();
            $ass->save();
            Mail::to('s1177304@student.windesheim.nl')->send(new tempSave($ass));
        } else {
            $email_data["email"] = "s1177304@student.windesheim.nl";
            $email_data["title"] = "Nieuwe aanmelding Comakership";

            $ass->grade_key = Str::uuid();
            $ass->save();

            $ass->load('student1');
            $ass->load('student2');
            $ass->load('answers');

            // Laadt de categorieën in en de vragen
            $categories = QuestionCategory::with('questions')->get();
            $answers = [];
            foreach ($ass->answers as $answer) {
                $answers[$answer->question_id] = $answer;
            }
            $email_data['assignment'] = $ass;

            //Genereert PDF die naar arie wordt verzonden
            $pdf = Pdf::loadView('emails.PDF_form', ['assignment' => $ass, 'answers' => $answers, 'categories' => $categories]);

            Mail::send('emails.PDF_mail', $email_data, function ($message) use ($email_data, $pdf, $ass) {
                $message->to("arie@windesheim.nl")->subject($email_data['title'])
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->first_name . ($ass->student2 ? "_" . $ass->student2->first_name : '') . ".pdf");
            });
            //Stuurt bevestiging naar student
        }
        return redirect('questions/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ass = Assignment::with('student1')->with('student2')->with('answers')->where('edit_key', '=', $request->edit_key)->find($id);
        $ass->edit_key = null;
        $ass->save();
        foreach ($ass->answers as $answer) {
            $answer->answer = $request->questions[$answer->question_id];
            $answer->save();
        }
        //Mail
        if ($request->submit == 'temp') {
            $ass->edit_key = Str::uuid();
            $ass->save();
            Mail::to('s1177304@student.windesheim.nl')->send(new tempSave($ass));
        } else {

            $email_data["email"] = "s1177304@student.windesheim.nl";
            $email_data["title"] = "Nieuwe aanmelding Comakership";

            $ass->grade_key = Str::uuid();
            $ass->save();

            $ass->load('student1');
            $ass->load('student2');
            $ass->load('answers');

            $categories = QuestionCategory::with('questions')->get();
            $answers = [];
            foreach ($ass->answers as $answer) {
                $answers[$answer->question_id] = $answer;
            }
            $email_data['assignment'] = $ass;

            $pdf = Pdf::loadView('emails.PDF_form', ['assignment' => $ass, 'answers' => $answers, 'categories' => $categories]);

            Mail::send('emails.PDF_mail', $email_data, function ($message) use ($email_data, $pdf, $ass) {
                $message->to("arie@windesheim.nl")->subject($email_data['title'])
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->first_name . ($ass->student2 ? "_" . $ass->student2->first_name : '') . ".pdf");
            });
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //error handling goedkeuren en afkeuren aanmeldingen
    public function checkGradeAllowed(Assignment $ass, string $key){
        $error = null;
        if (!$ass) dd('no ass found');
        if (!$ass->grade_key && !$ass->edit_key) $error = 'Opdracht is al geaccepteerd.';
        else if ($ass->edit_key && !$ass->grade_key) $error = 'Opdracht is nog niet klaar om te beoordelen.';
        else if ($ass->grade_key != $key) $error = 'Beoordeling niet toegestaan';
        return $error;
    }

    //goedkeuren van aanmelding
    public function grade(Request $request, string $id)
    {
        $ass = Assignment::with('student1')->with('student2')->with('answers')->find($id);
        $checkGradeAllowed = $this->checkGradeAllowed($ass, $request->query('key'));
        if($checkGradeAllowed != null) return view("grading.grading_error", ["error" => $checkGradeAllowed]);
        if ($request->accept) {
            $ass->grade_key = null;
            $ass->save();
            $categories = QuestionCategory::with('questions')->get();
            $answers = [];
            foreach ($ass->answers as $answer) {
                $answers[$answer->question_id] = $answer;
            }
            $email_data['title'] = "Comakership geaccepteerd";

            $pdf = Pdf::loadView('emails.PDF_form', ['assignment' => $ass, 'answers' => $answers, 'categories' => $categories]);
            $email_data['assignment'] = $ass;
            Mail::send('emails.Assignment_accepted', $email_data, function ($message) use ($email_data, $pdf, $ass) {
                $message->to("arie@windesheim.nl")->subject($email_data['title'])
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->first_name . ($ass->student2 ? "_" . $ass->student2->first_name : '') . ".pdf");
            });
        } else {
            return view('grading.grade', ["accepted"=>false, "key"=>$request->query('key'), "assignment"=>$ass]);
        }
    }

    //afkeuren van aanmelding
    public function reject(Request $request, string $id) {
        $ass = Assignment::with('student1')->with('student2')->with('answers')->find($id);
        $checkGradeAllowed = $this->checkGradeAllowed($ass, $request->key);
        if($checkGradeAllowed != null) return view("grading.grading_error", ["error" => $checkGradeAllowed]);
        $ass->grade_key = null;
        $ass->save();
        $ass->edit_key = Str::uuid();
        $ass->feedback = $request->reason;
        $ass->draft = true;
        $ass->save();
        Mail::to('s1177304@student.windesheim.nl')->send(new tempSave($ass, true));
        return view('grading.grade_rejected');
    }
}
