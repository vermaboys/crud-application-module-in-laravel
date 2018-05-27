@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ URL::to('student') }}">View All Students</a>
            <a href="{{ URL::to('student/create') }}">Add Student</a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="jumbotron text-center">
                    <h2>{{ $student->name }}</h2>
                    <p>
                        <strong>Email:</strong> {{ $student->email }}<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection