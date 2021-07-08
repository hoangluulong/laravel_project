@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>List course_subject</h2>
        </div>
    </div>
</div>
   
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="menu-search">
    <a class="btn btn-success" href="{{ route('coursesubjects.create') }}"> Create New Course</a>
    <form class="form-inline" action="{{ route('searchcoursesubjects') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <select  name="search_id" id="search_id">
                <option value="course_id" selected>course_id</option>
                <option value="subject_id">subject_id</option>
                <option value="course_name">Course</option>
                <option value="course_semester">Subject</option>
            </select>
            <input type="text" class="form-control" name="search" id="search" placeholder="search course">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>
<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Course ID</th>
        <th>Subject ID</th>
        <th>Course_name</th>
        <th>Subject_name</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($coursesubjects as $coursesubject)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $coursesubject->course_id }}</td>
        <td>{{ $coursesubject->subject_id }}</td>
        <td>{{ $coursesubject->manyCourse[0]['course_name'] }}</td>
        <td>{{ $coursesubject->manySubject[0]['subject_name'] }}</td>
        <td>{{ $coursesubject->status}}</td>
        <td>
            <form action="{{ route('coursesubjects.destroy',$coursesubject->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('coursesubjects.edit',$coursesubject->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
  
    {!! $coursesubjects->links() !!}
      
@endsection