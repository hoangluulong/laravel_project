@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List subject</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subjects.create') }}"> Create New Course</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form class="form-inline" action="{{ route('search') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="search course">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>subject_name</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subjects as $subject)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $subject->subject_name }}</td>
            <td>{{ $subject->status}}</td>
            <td>
            
                <form action="{{ route('subjects.destroy',$subject->subject_id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->subject_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subjects->links() !!}
      
@endsection