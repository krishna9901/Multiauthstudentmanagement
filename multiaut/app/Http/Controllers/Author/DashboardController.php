<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolClass;
Use App\Models\Section;

class DashboardController extends Controller
{
    public function index(){
    	// return view('author.dashboard');
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
       
        return view('author.dashboard', compact('student'));
    }
}
