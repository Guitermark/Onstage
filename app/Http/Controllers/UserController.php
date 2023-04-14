<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $user = User::create(
        //     $request->only([0]['first_name'], [0]['last_name'], [0]['student_number'], [0]['email'], [0]['ec'], [0]['modules'], [0]['previous_comakership'])
        // );

        // $user = User::create(
        //     $request->only([1]['first_name'], [1]['last_name'], [1]['student_number'], [1]['email'], [1]['ec'], [1]['modules'], [1]['previous_comakership'])
        // );
        // $user = new User;
        // dd($student1);
        $student1 = $request->student_1;
        $student1['modules'] = join(" | ", $student1['modules']);

        $student2 = $request->student_2;
        $student2['modules'] = join(" | ", $student2['modules']);

        User::create($student1);
        User::create($student2);

        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->student_number = $request->student_number;
        // $user->email = $request->email;
        // $user->ec = $request->ec;
        // $user->modules = $request->modules; 
        // $user->previous_comakership = $request->previous_comakership;

        return redirect('questions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
