@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add course_subject</h2>
        </div>
    </div>
</div>
   <hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('coursesubjects.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course name:</strong>
                <select  name="course_id" class="selected">
                    <option selected>Choose course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->course_id }}">{{ $course->course_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject name:</strong>
                <select  name="subject_id" class="selected">
                    <option selected>Choose subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->subject_id }}">{{ $subject->subject_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status</strong>
                <input type="text" name="status" class="form-control" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
   
</form>
@endsection