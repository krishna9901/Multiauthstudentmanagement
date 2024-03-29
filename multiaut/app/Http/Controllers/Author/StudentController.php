<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\Section;
//use App\Schoolclass;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
  /**
     * Display a listing of the students.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $students = Student::all();
    //     $schoolclasses = SchoolClass::all();
    //     return view('students.index', compact('students'));
    // }

    
public function index()
{
    $students = Student::all();
    // $schoolclasses = SchoolClass::all();
    return view('students.index', compact('students'));
}

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schoolclasses = SchoolClass::all();
        // return view('students.create');
        return view('students.create', compact('schoolclasses'));
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */





public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'roll_no' => 'required|string',
        'first_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:users,email|unique:students,email',
        'password' => 'required|string|min:8',
        'dob' => 'required|date',
        'student_image' => 'nullable|image',
        'phone_number' => 'required|string',
        'class_id' => 'required|string',
        'section_id' => 'required|string',
        'role_id' => 'required|string',
    ]);

    // Hash the password before storing it in the database
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Handle image upload
    if ($request->hasFile('student_image')) {
        $file = $request->file('student_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('student/Images/', $filename);
        $validatedData['student_image'] = $filename;
    }

    // Create a new User object and fill it with validated data
    $user = new User();
    $user->name = $validatedData['first_name'];
    $user->username = $validatedData['first_name'];
    $user->email = $validatedData['email'];
    $user->role_id = $validatedData['role_id'];
    $user->password = $validatedData['password']; // Already hashed
    $user->save();

    // Create a new Student object and fill it with validated data
    $student = new Student();
    $student->fill($validatedData);
    $student->user_id = $user->id; // Associate the user with the student record
    $student->save();

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
}










    /**
     * Display the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

        $schoolclasses = SchoolClass::all();
        return view('students.edit', compact('student','schoolclasses'));
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'roll_no' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
         
            'dob' => 'required|date',
            'student_image' => 'nullable|image',
            'phone_number' => 'required|string',
            'class_id' => 'required|string',
            'section_id' => 'required|string',
         
        ]);
     
        // Handle image upload
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('student/Images/', $filename);
            $validatedData['student_image'] = $filename;
        }
    
        // Update the student record with the validated data
        $student->update($validatedData);



        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }






    /**
     * Remove the specified student from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student,User $user)
    {
        // Retrieve the associated user
    $user = $student->user;

    // Delete the student record
    $student->delete();

    // Delete the associated user record
   // Check if an associated user exists before attempting to delete
   if ($user) {
    $user->delete();
}
  
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }



    public function getSections($class_id)
    {
        $sections = Section::where('class_id', $class_id)->get();
        return response()->json($sections);
    }




    public function dashboard()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
    
        return view('author.dashboard', compact('student'));
    }





}


   
 


