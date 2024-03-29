@extends('layouts.app')

@section('content')

    <div class="container-fluid">

    <div class="card">
        <div class="card-title">
        <h1 class="">Students List</h1>
       <button class="btn btn-success"> <a href="{{ route('students.create') }}" >Add New Student</a></button>
</div>
        <table class="table" 
             style="width:100%" id="students-table">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="students-table-body  ">
               @foreach ($students as $student)
                    <tr>
                        <td id="modalRollNo">{{ $student->roll_no }}</td>
                       <td  data-toggle="modal" data-target="#exampleModal">
{{ $student->first_name }} {{ $student->last_name }}</a>
</td>
                        
                        <td>{{ $student->email }}</td>
                        <td>
    @if($student->student_image)
    <img src="{{ asset('student/Images/'.$student->student_image) }}" alt="student Image" width="50px" height="50px"/> 
       
    @else
        No Image Available
    @endif
</td> 
                        <td>{{ $student->dob->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>

        <div id="pagination"></div> <!-- Container for pagination -->
      
    
</div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <div> -->

      <table class="table" 
             style="width:100%" id="students-table">
            <thead>
                <tr>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Date of Birth</th>
                   
                </tr>
            </thead>
       <tbody id="students-table-body  ">
              @foreach ($students as $student) 
                    <tr>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}
</td>
                        
                        <td>{{ $student->email }}</td>
                        <td>
    @if($student->student_image)
    <img src="{{ asset('student/Images/'.$student->student_image) }}" alt="student Image" width="50px" height="50px"/> 
       
    @else
        No Image Available
    @endif
</td> 
                        <td>{{ $student->dob->format('M d, Y') }}</td>
                       
                    </tr>
                @endforeach 
            </tbody> 


</table>
            <!-- Add more details as needed -->
        <!-- </div> -->

    <!-- </div> -->
      <!-- </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>






<script>

$(document).ready(function() {
    $('#students-table tbody').on('click', '.student-details', function() {
        // Get the clicked row
        var rowData = $(this).closest('tr').find('td');
        
        
        // Retrieve data based on cell index
        var rollNo = $(this).find('td:eq(0)').text();
            var name = $(this).find('td:eq(1)').text();
            var email = $(this).find('td:eq(2)').text();

            // Append row data to modal body
            modalBody.append('<p><strong>Roll No:</strong> ' + rollNo + '</p>');
            modalBody.append('<p><strong>Name:</strong> ' + name + '</p>');
            modalBody.append('<p><strong>Email:</strong> ' + email + '</p>');

        
        // Show the modal
        $('#studentModal').modal('show');
    });
});

</script>




    
<script>
    $(document).ready(function() {
        // Initialize DataTables with client-side processing
        var table = $('#students-table').DataTable({
            paging: true, // Enable pagination
            searching: true, // Enable search functionality
            
        });
    });
</script>
    
    
@endsection
