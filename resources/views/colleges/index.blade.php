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
            <div class="alert alert-success">{{$message}}</div>
          @endif
          @if($colleges->count()>0)
            @foreach($colleges as $index => $college)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{$college->name}}</td>
                <td>{{$college->address}}</td>
                <td width="150">
                  <a href="{{route('colleges.edit', $college->id)}}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                </td>
            @endforeach
            
            <form id="form-delete" method="POST" style="display: none">
              @method('DELETE')
              @csrf
            </form>
          @endif
        </tbody>
      </table>
  
    </div>
  </div>
    </main>

@endsection