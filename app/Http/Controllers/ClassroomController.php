<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Git\Factories\OrgFactory;
use App\Git\GitHub;
use App\Git\Repositories\OrgRepository;
use App\Http\Requests\StoreClassroom;
use App\PendingMember;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'setup', 'teacher']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GitHub $api)
    {
        $orgs =  $api->organization()->all()->filter(function ($org) {
            return ! Auth::user()->role->classrooms()->where('name', $org->name)->exists();
        });

        return view($orgs->isEmpty() ? 'teacher.classroom.empty-create' : 'teacher.classroom.create', [
            'orgs' => $orgs
        ])->withTitle('Create Classroom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroom $request)
    {
        $classroom = Auth::user()->role->classrooms()->create([
            'name' => request('name'),
            'token' => Str::random(20)
        ]);

        return redirect()->route('classroom.show', $classroom->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('teacher.classroom.show', [
            'classroom' => $classroom,
        ])->withTitle($classroom->name);
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

    public function handlePending(Classroom $classroom, OrgFactory $orgFactory)
    {
        if (request()->has('deny')) {
            PendingMember::findOrFail(request('deny'))->delete();
            flash()->success('You\'ve denied access!');

            return redirect()->back();
        }


        $pending = PendingMember::findOrFail(request('accept'));

        if ($classroom->id != $pending->classroom_id) {
            return redirect()->back();
        }

        $classroom->students()->attach($pending->user);
        $orgFactory->join($classroom->name, $pending->user->username);

        $pending->delete();
        flash()->success('Accepted the request to join classroom.');

        return redirect()->back();

    }
}
