@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List class</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
<div class="menu-search">
    <a class="btn btn-success" href="{{ route('classes.create') }}"> Create New Class</a>
    <form class="form-inline" action="{{ route('searchclass') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <select  name="search_id" id="search_id">
            <option value="class_name" selected>class name</option>
            <option value="course_name">course name</option>
            <option value="faculty_name">faculty name</option>
                <option value="teacher_id">teacher id</option>
                <option value="course_id">course id</option>
                <option value="faculty_id">faculty id</option>
            </select>
            <input type="text" class="form-control" name="search" id="search" placeholder="search course">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>

    </form>
</div>
   
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Class_Name</th>
            <th>Teacher_id</th>
            <th>Faculty_id</th>
            <th>Course_id</th>
            <th>Course_name</th>
            <th>Faculty_name</th>
            <th>Action</th>
        </tr>
        @foreach ($classes as $class)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $class->class_name }}</td>
            <td>{{ $class->teacher_id }}</td>
            <td>{{ $class->faculty_id }}</td>
            <td>{{ $class->course_id }}</td>
            <td>{{ $class->manyCourse[0]['course_name'] }}</td>
            <td>{{ $class->manyFaculty[0]['faculty_name'] }}</td>
            <td>
                <form action="{{ route('classes.destroy',$class->class_id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('classes.edit',$class->class_id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $classes->links() !!}
      
@endsection
