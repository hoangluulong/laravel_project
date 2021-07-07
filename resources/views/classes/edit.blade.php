@extends('layout')
   
@section('content')

<?php
?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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

    <form action="{{ route('classes.update',$class->class_id) }}" method="POST">
        @csrf
        @method('PUT')
   
        
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class name:</strong>
                <input type="text" name="class_name" value="{{ $class->class_name }}" class="form-control" placeholder="Class name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teacher id:</strong>
                <input type="text" name="teacher_id" value="{{ $class->teacher_id }}" class="form-control" placeholder="teacher id">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course name:</strong>
                <select  name="course_id">
                    @foreach ($courses as $course)
                        @if ($course->course_id == $class->course_id)
                            <option value="{{ $course->course_id }}" selected>{{ $course->course_name}}</option>
                        @else
                        <option value="{{ $course->course_id }}">{{ $course->course_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Faculty name:</strong>
                <select  name="faculty_id">
                    @foreach ($faculties as $faculty)
                        @if ($faculty->faculty_id == $class->faculty_id)
                            <option value="{{ $faculty->faculty_id }}" selected>{{ $faculty->faculty_name}}</option>
                        @else
                            <option value="{{ $faculty->faculty_id }}">{{ $faculty->faculty_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <input type="text" name="status" value="{{ $class->status }}" class="form-control" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
    </form>
@endsection