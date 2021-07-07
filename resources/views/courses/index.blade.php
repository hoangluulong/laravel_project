@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List course</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('courses.create') }}"> Create New Course</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <!-- 'course_name', 'course_semester', 'course_year', 'status' -->
    Search course
    <form class="form-inline" action="{{ route('search') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <select  name="search_id">
                <option value="course_name" selected>course name</option>
                <option value="course_semester">course semester</option>
                <option value="course_year">course year</option>
            </select>
            <input type="text" class="form-control" name="search" id="search" placeholder="search course">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>course_name</th>
            <th>course_semester</th>
            <th>course_year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->course_semester }}</td>
            <td>{{ $course->course_year }}</td>
            <td>
            
                <form action="{{ route('courses.destroy',$course->course_id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('courses.edit',$course->course_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $courses->links() !!}
      
@endsection