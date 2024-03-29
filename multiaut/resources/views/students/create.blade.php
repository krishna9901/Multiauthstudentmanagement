<!-- resources/views/students/create.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file called app.blade.php -->

@section('content')
    <div class="container">
    <div class="card">
        <h1 class="card-title">Create New Student</h1>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
<div class="col-md-6">
            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" name="roll_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group ">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>
            
            <div class="form-group ">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <!-- <div class=""> -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <!-- <div class=""> -->
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <!-- </div> -->
                        </div>

</div>
<div class="col-md-6">


            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_image">Student Image:</label>
                <input type="file" name="student_image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
          
            <div class="form-group">
    <label for="class_id">Class Or Grade</label>
    <select name="class_id" id="class_id" class="form-control">
        <option value="">Select Class </option>
        @foreach($schoolclasses as $schoolclass)
            <option value="{{ $schoolclass->id }}">{{ $schoolclass->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="section_id">Section</label>
    <select name="section_id" id="section_id" class="form-control">
        <option value="">Select Section</option>
    </select>
</div>


            <div class="form-group">
        <label for="role_id">Role:</label>
        <select name="role_id" class="form-control" required>
            <option value="01">Admin</option>
            <option value="02">Student</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-submitalign text-right">Submit</button>
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
