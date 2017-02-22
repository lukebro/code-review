<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Git\Repositories\OrgRepository;
use App\PendingMember;
use App\Student;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('setup');
	}

    public function index()
    {
        $lookup = [
            Teacher::class => $this->teacherIndex(),
            Student::class => $this->studentIndex(),
        ];

        return $lookup[Auth::user()->type];
    }

    public function studentIndex()
    {
    	 return view('student.dashboard.index', [
    	 	'user' => Auth::user(),
            'classrooms' => Auth::user()->role->classrooms,
            'pendings' => Auth::user()->pending,
    	 ])->withTitle('Dashboard');
    } 

    public function teacherIndex()
    {
         return view('teacher.dashboard.index', [
            'user' => Auth::user(),
            'classrooms' => Auth::user()->role->classrooms,
         ])->withTitle('Dashboard');
    } 

    public function join()
    {
        $classroom = Classroom::where('code', request('code'))->first();

        if (is_null($classroom)) {
            flash()->danger('This class doesn\'t exist!');
            
            return redirect('dashboard');
        }

        if ($classroom->students->contains(Auth::user())) {
            flash()->danger('You\'re already in the class.');

            return redirect('dashboard');
        }

        PendingMember::create([
            'classroom_id' => $classroom->id,
            'user_id' => Auth::id(),
        ]);

        flash()->success('You\'ve been enrolled in the class "' . $classroom->name . '".  Your teacher needs to approve you\'re account before you can view it.');

        return redirect('dashboard');
    }
    
}
