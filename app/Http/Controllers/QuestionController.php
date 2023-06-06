<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Assignment;
use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    //Haalt categorieën op en vragen
    public function create(Request $request)
    {
            $categories = QuestionCategory::with('questions')->get();
            return view('ADSD1', ['categories' => $categories, 'graduate' => $request->input('graduate') ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ass = Assignment::with('student1')->with('answers')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $categories = QuestionCategory::with('questions')->get();
        $ass = Assignment::with('student1')->with('student2')->with('answers')->where('edit_key', '=', $request->query('key'))->find($id);
        $answers=[];
        foreach($ass->answers as $answer){
            $answers[$answer->question_id] = $answer;
        }
        if($ass->draft)
        {
            return view('ADSD1', ['categories' => $categories, 'assignment' => $ass, 'answers' => $answers, 'graduate' => $ass->graduate ]);

        }
        else{
            return redirect()->action([QuestionController::class, 'show'], ['question' => $id]);
        }
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
