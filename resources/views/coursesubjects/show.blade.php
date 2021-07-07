@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Courses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coursesubjects.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course ID:</strong>
                {{ $coursesubject->course_id }}
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject ID:</strong>
                {{ $coursesubject->subject_id }}
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $coursesubject->status }}
            </div>
        </div>
    </div>
@endsection