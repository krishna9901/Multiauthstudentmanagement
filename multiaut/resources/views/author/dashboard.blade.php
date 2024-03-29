

<!-- resources/views/student/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        
    <div class="card">
        <div class="card-title">
        <h1>Student Dashboard</h1>
        <table class="table">
            <thead>
                <tr>
                <th>Profile Image</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Email</th>
                   
                    <th>DOB</th>
                    <th>Phone_No</th>
                   
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
    @if($student->student_image)
    <img src="{{ asset('student/Images/'.$student->student_image) }}" alt="student Image" width="50px" height="50px"/> 
       
    @else
        No Image Available
    @endif
</td> 
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td> <!-- Assuming student belongs to a user -->
                    <!-- Add more cells for additional student details -->

                   
<td>{{ $student->dob->format('M d, Y') }}</td>

<td>{{ $student->phone_number}}</td>

                </tr>
            </tbody>
        </table>

</div>
</div>
    </div>
@endsection
















 