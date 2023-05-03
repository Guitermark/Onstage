<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\tempSave;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\Question;
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
        if(!$request->graduate){
            
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
        $ass->description = $request->assignment['description'];
        $ass->student1()->associate($students[0]);
        if(isset($students[1]))$ass->student2()->associate($students[1]);
        $ass->draft = $request->submit == 'temp';
        $ass->graduate = !!$request->graduate;
        $ass->save();
        //Questions
        foreach($request->questions as $question_id => $answer) {
            Answer::create([
                'answer' => $answer,
                'question_id' => $question_id,
                'assignment_id' => $ass->id
            ]);
        }
        
        //Mail
        if($request->submit == 'temp'){
            $ass->edit_key = Str::uuid();
            $ass->save();
            // dd($ass);
            Mail::to('s1177304@student.windesheim.nl')->send(new tempSave($ass));
        }else {
            $data["email"] = "user";
            $data["Title"] = "Nieuwe aanmelding Comakership";

            $pdf = Pdf::loadView('pdf_mail', $data);

            Mail::send('pdf_mail', $data, function ($message) use ($data, $pdf){
                $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "test.pdf");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
