@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Courses</h2>
            </div>
        </div>
    </div>
   <hr>
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
  
    <form action="{{ route('courses.update',$course->course_id) }}" method="POST">
        @csrf
        @method('PUT')
   <!-- 'course_name', 'course_semester', 'course_year', 'status' -->
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Course name:</strong>
                    <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" placeholder="Course name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Course semester: </strong>
                    <select  name="course_semester" class="selected">
                            @if ($course->course_semester === "Hoc ky1")
                                <option value="Hoc ky1" selected>Hoc ky1</option>
                                <option value="	Hoc ky2">	Hoc ky2</option>
                            @else
                                <option value="	Hoc ky2" selected>Hoc ky2</option>
                                <option value="Hoc ky1">Học kỳ 1</option>
                            @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Course year:</strong>
                    <select  name="course_year" class="selected">
                        @foreach ($years as $year)
                            @if ($year == $course->course_year)
                                <option value="{{ $year }}" selected>{{ $year }}</option>
                            @else
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Edit course</button>
            </div>
        </div>
   
    </form>
@endsection