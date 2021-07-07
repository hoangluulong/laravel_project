@extends('package-courses::admin.dashboard')
@section('content-dashboard')

    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md">
            @if (isset($course))
                <div class="navbar-brand">Update course</div>
            @else
                <div class="navbar-brand">Add course</div>
            @endif
        </nav>
        <div class="card shadow">
            <div class="card-body">
                @if (isset($course))
                    <form method="post" action="{{ route('course.update') }}">
                        <input hidden name="course_id" value="{{$course->diary_id}}"></input>
                    @else
                        <form method="post" action="{{ route('course.store') }}">
                @endif
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="username"><strong>Course Name</strong></label>
                            @if (isset($course))
                                <input class="form-control" type="text" placeholder="{{ $course->course_name }}"
                                    name="course_name"></input>
                            @else
                                <input class="form-control" type="text" name="course_name"></input>
                            @endif
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-sm ml-auto" type="button">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
