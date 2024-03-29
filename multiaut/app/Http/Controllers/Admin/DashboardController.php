<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index(){
    	
        $students = Student::all();
     
        return view('admin.dashboard', compact('students'));
    }
}
