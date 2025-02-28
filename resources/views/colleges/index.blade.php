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
          @if($colleges->count()>0)
            @foreach($colleges as $index => $college)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{$college->name}}</td>
                <td>{{$college->address}}</td>
                <td width="150">
                  <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" style="color: red;" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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


<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="delete-role">
        <div class="modal-header">
          <h4 class="modal-title">Delete Model</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>


@endsection