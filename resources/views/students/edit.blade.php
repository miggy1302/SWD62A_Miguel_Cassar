@extends('layouts.main')

@section('content')
<main class="py-5" style="background-color: #121212; color: #fff;">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #333; border: 1px solid #444;">
                    <div class="card-header card-title" style="background-color: #444; border-bottom: 1px solid #555; color: #fff;">
                        <strong>Edit Student</strong>
                    </div>
                    <div class="card-body" style="color: #fff;">
                        <form action="{{route('students.update', $student->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            @include('students._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
