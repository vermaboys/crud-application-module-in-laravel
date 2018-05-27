@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
                <a href="{{ URL::to('student') }}">View All Students</a>
                <a href="{{ URL::to('student/create') }}">Add Student</a>
            </div>
        <div class="col-md-8">
            <?php
                if(count($errors->all())>0){
                    foreach ($errors->all() as  $value) {
                        echo "<div>".$value."</div>";
                    }
                }
            ?>

            <form action="{{ route('student.update',$student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $student->email }}">
                </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection