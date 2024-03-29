<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Details</h1>
        <div>
            <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>
            <p><strong>image:</strong> {{ $student->student_image}}</p>
            <p><strong>First Name:</strong> {{ $student->first_name }}</p>
            <p><strong>Middle Name:</strong> {{ $student->middle_name }}</p>
            <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Date of Birth:</strong> {{ $student->dob->format('M d, Y') }}</p>
            <!-- Add more details as needed -->
        </div>
        <a href="{{ route('students.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
