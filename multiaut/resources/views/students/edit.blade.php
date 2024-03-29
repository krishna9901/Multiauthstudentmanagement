<!-- resources/views/students/edit.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file called app.blade.php -->

@section('content')
    <div class="container-fluid">
        <div class="card">
            
        <h1 class="card-title">Edit Student Form</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="row">
    <div class="col-md-6">


           <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" name="roll_no" class="form-control" value="{{ $student->roll_no }}" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" class="form-control" value="{{ $student->middle_name }}">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
            </div>
       

           

            <div class="form-group">
                <label for="student_image">Student Image:</label>
                <input type="file" name="student_image" class="form-control-file">
                @if($student->student_image)
                    <img src="{{ asset('storage/' . $student->student_image) }}" alt="Student Image" style="max-width: 150px;">
                @endif
            </div>

</div>
<div class="col-md-6">

<div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" class="form-control" value="{{ $student->dob->format('Y-m-d') }}" required>
            </div>
           
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" value="{{ $student->phone_number }}" required>
            </div>
            <div class="form-group">
                <label for="class_id">Class Or Grade</label>
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Select Class </option>
                    @foreach($schoolclasses as $schoolclass)
                        <option value="{{ $schoolclass->id }}" @if($student->class_id == $schoolclass->id) selected @endif>{{ $schoolclass->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="section_id">Section</label>
                <select name="section_id" id="section_id" class="form-control">
                    <option value="">Select Section</option>
                </select>
            </div>

        
            <button type="submit" class="btn btn-primary btn-button submitalign">Update</button>

</div>
</div>
           

        </form>
</div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#class_id').change(function(){
            var classId = $(this).val();
            if(classId){
                $.ajax({
                    type:"GET",
                    url:"/sections/"+classId,
                    success:function(res){
                        if(res){
                            $("#section_id").empty();
                            $.each(res,function(key,value){
                                $("#section_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }else{
                            $("#section_id").empty();
                        }
                    }
                });
            }else{
                $("#section_id").empty();
            }
        });
    });
</script>









@endsection
