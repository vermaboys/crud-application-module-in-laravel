@extends('layouts.app')

@section('content')

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ URL::to('student') }}">View All Students</a>&nbsp;
            <a href="{{ URL::to('student/create') }}">Add Student</a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $srno=1;
                        ?>
                        @foreach($student as $value)
                            <tr>
                                 <td>{{ $srno++ }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>

                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-small btn-success" href="{{ URL::to('student/' . $value->id) }}">Show this Student</a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-small btn-info" href="{{ URL::to('student/' . $value->id . '/edit') }}">Edit this Student</a>
                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/destroy/{id} -->
                                   <form action="{{ route('student.destroy',$value->id) }}" method="POST">
                                    @csrf
                                    
                                    <input type="hidden" name="_method" value="DELETE"> 
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection