<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Classroom $classroom)
    {
        return view('teacher.assignments.create', [
            'classroom' => $classroom
        ])->withTitle('Create Assignment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, Request $request)
    {
        $assignment = $classroom->assignments()->create(request([
            'name',
            'prefix',
            'public'
        ]));

        foreach(request('checkpoint') as $checkpoint) {
            $assignment->checkpoints()->create([
                'name' => $checkpoint['name'],
                'due_at' => Carbon::parse($checkpoint['due_at'])
            ]);
        }

        flash()->success('Assignment ' . request('name') . ' has been created successfully!');

        return redirect()->route('classrooms.show', $classroom->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Assignment $assignment)
    {
        return view('teacher.assignments.show', [
            'classroom' => $classroom,
            'assignment' => $assignment
        ])->withTitle($assignment->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
