@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List lop hoc</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('classes.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Class_Name</th>
            <th>Teacher_id</th>
            <th>Faculty_id</th>
            <th>Course_id</th>
            <th>Course_name</th>
            <th>Faculty_name</th>
            <th width="280px">Action</th>
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
