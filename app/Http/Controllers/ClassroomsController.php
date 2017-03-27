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

class ClassroomsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'setup']);

        $this->middleware('teacher', ['except' => ['index', 'join', 'show']]);

        $this->middleware('student', ['only' => 'join']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view(Auth::user()->view . '.classrooms.index', [
            'user' => Auth::user(),
            'classrooms' => Auth::user()->role->classrooms,
         ])->withTitle('Classrooms');
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

        return view($orgs->isEmpty() ? 'teacher.classrooms.empty-create' : 'teacher.classrooms.create', [
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
            'org' => request('org'),
            'token' => Str::random(20)
        ]);

        return redirect()->route('classrooms.show', $classroom->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view(Auth::user()->view . '.classrooms.show', [
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

    public function join($token)
    {
        $classroom = Classroom::where('token', $token)->first();

        if(! $classroom) {
            flash()->danger('Classroom does not exist, check the invitation link.');
            return redirect()->route('classrooms.index');
        }

        if (Auth::user()->role->classrooms->contains($classroom)) {
            flash()->warning('You\'re already part of this classroom silly.');
            return redirect()->route('classrooms.index');
        }

        $classroom->students()->attach(Auth::user());
        flash()->success('You\'ve joined the class "' . $classroom->name . '".');

        return redirect()->route('classrooms.show', $classroom->id);
    }
}
