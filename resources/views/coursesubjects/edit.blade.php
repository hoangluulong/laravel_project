@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Couser_subject</h2>
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
  
    <form action="{{ route('coursesubjects.update',$coursesubject->id) }}" method="POST">
        @csrf
        @method('PUT')
   <!-- 'course_name', 'course_semester', 'course_year', 'status' -->
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Course name:</strong>
                    <select  name="course_id" class="selected">
                        @foreach ($courses as $course)
                            @if ($course->course_id == $coursesubject->course_id)
                                <option  value="{{ $course->course_id }}" selected>{{ $course->course_name }}</option>
                            @else
                                <option value="{{ $course->course_id }}">{{ $course->course_name}}</option>
                            @endif
                        @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subject name:</strong>
                    <select  name="subject_id" class="selected">
                        
                        @foreach ($subjects as $subject)
                            @if ($subject->subject_id == $coursesubject->subject_id)
                                <option  value="{{ $subject->subject_id }}" selected>{{ $subject->subject_name }}</option>
                            @else
                                <option value="{{ $subject->subject_id }}">{{ $subject->subject_name}}</option>
                            @endif
                        @endforeach
                </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                    <input type="text" name="status" value="{{$coursesubject->status}}" class="form-control" placeholder="Course semester">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
   
    </form>
@endsection