@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Courses</h2>
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
   
<form action="{{ route('courses.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course name:</strong>
                <input type="text" name="course_name" class="form-control" placeholder="Course name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course semester:</strong>
                <select  name="course_semester" class="selected">
                <option selected></option>
                    <option value="Hoc ky1">Học kỳ 1</option>
                    <option value="Hoc ky2">Học kỳ 2</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <strong>Course year:</strong>
                    <select  name="course_year" class="selected">
                    <option selected></option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course status</strong>
                <input type="text" name="status" class="form-control" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create course</button>
        </div>
    </div>
   
</form>
<!-- 'course_name', 'course_semester', 'course_year', 'status' -->
@endsection