@extends('layouts.main')

@section('content')

<main class="py-5">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>students Available</h2>
          </div>
          <div class="col-sm-6">
            <a href="{{route('students.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New </span></a>
          </div>
        </div>
      </div>
      @include('students._filter')
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>College</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if($message = session('message'))
            <div class="alert alert-success" id="success-alert">{{ $message }}</div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                setTimeout(function() {
                    $("#success-alert").fadeOut("slow");
                }, 2000);
            </script>
          @endif
          @if($students->count()>0)
            @foreach($students as $index => $student)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->dob}}</td>
                <td>{{$student->college->name}}</td>
                <td width="150">
                  <a href="{{route('students.edit', $student->id)}}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                  <a href="javascript:void(0);" class="btn-delete" 
                    onclick="event.preventDefault(); 
                              if(confirm('Are you sure you want to delete this student?')) { 
                                  document.getElementById('form-delete-{{$student->id}}').submit(); 
                              }">
                      <i class="material-icons" style="color: red;" data-toggle="tooltip" title="Delete">&#xE872;</i>
                  </a>

                  <!-- Hidden delete form -->
                  <form id="form-delete-{{$student->id}}" action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                      @csrf
                  </form>

            </td>
        </tr>
        @endforeach
          @endif
        </tbody>
      </table>
  
    </div>
  </div>
    </main>

@endsection