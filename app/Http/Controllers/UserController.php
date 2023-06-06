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
        $student1['modules'] = join("|", $student1['modules']);
        $students[] = User::create($student1);
        if (!$request->graduate) {

            // dd($request);

            $student2 = $request->student_2;
            $student2['modules'] = join("|", $student2['modules']);
            $students[] = User::create($student2);
        }
        // else{

        //     $student1 = $request->student;
        //     $student1['modules'] = join("|", $student1['modules']);
        //     $students[] = User::create($student1);

        //     $student2 = $request->student;
        //     $student2['modules'] = join("|", $student2['modules']);
        //     $students[] = User::create($student2);
        // }



        //Assignment
        $ass = new Assignment();
        $ass->student1()->associate($students[0]);
        if (isset($students[1])) $ass->student2()->associate($students[1]);
        $ass->draft = $request->submit == 'temp';
        $ass->graduate = !!$request->graduate;

        //Competesence
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
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->name . ($ass->student2 ? "_" . $ass->student2->name : '') . ".pdf");
            });
            //Stuur mail naar student met ontvangstbevestiging 
            //Stuur mail naar arie met pdf
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
        foreach ($ass->answers as $answer) {
            // dump($answer);
            $answer->answer = $request->questions[$answer->question_id];
            $answer->save();
        }
        //Mail
        if ($request->submit == 'temp') {
            $ass->edit_key = Str::uuid();
            $ass->save();
            // dd($ass);
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
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->name . ($ass->student2 ? "_" . $ass->student2->name : '') . ".pdf");
            });
        }

        return redirect('/');
        // dd($ass);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function grade(Request $request, string $id)
    {
        $ass = Assignment::with('student1')->with('student2')->with('answers')->where('grade_key', '=', $request->query('key'))->find($id);
        if (!$ass) dd('no ass found');
        $ass->grade_key = null;
        $ass->save();
        if ($request->accept) {

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
                    ->attachData($pdf->output(), "AanmeldingComakership_" . $ass->student1->name . ($ass->student2 ? "_" . $ass->student2->name : '') . ".pdf");
            });
        } else {
            $ass->edit_key = Str::uuid();
            $ass->draft = true;
            $ass->save();
            Mail::to('s1177304@student.windesheim.nl')->send(new tempSave($ass, true));
        }
    }
}
