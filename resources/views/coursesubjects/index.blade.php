@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('coursesubjects.create') }}"> Create New Course</a>
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