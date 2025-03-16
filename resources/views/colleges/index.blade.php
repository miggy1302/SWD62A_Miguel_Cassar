@extends('layouts.main')

@section('content')

<main class="py-5">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Colleges Available</h2>
          </div>
          <div class="col-sm-6">
            <a href="{{route('colleges.create')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New </span></a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>College Name</th>
            <th>College Address</th>
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
          @if($colleges->count()>0)
            @foreach($colleges as $index => $college)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{$college->name}}</td>
                <td>{{$college->address}}</td>
                <td width="150">
                  <a href="{{route('colleges.edit', $college->id)}}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                  <a href="javascript:void(0);" class="btn-delete" 
                    onclick="event.preventDefault(); 
                              if(confirm('Are you sure you want to delete this college?')) { 
                                  document.getElementById('form-delete-{{$college->id}}').submit(); 
                              }">
                      <i class="material-icons" style="color: red;" data-toggle="tooltip" title="Delete">&#xE872;</i>
                  </a>

                  <!-- Hidden delete form -->
                  <form id="form-delete-{{$college->id}}" action="{{ route('colleges.destroy', $college->id) }}" method="POST" style="display: none;">
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