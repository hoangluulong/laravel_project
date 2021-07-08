@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List faculty</h2>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="menu-search">
    <a class="btn btn-success" href="{{ route('faculties.create') }}"> Create New Faculty</a>
    <form class="form-inline" action="{{ route('searchfaculties') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="search course">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>

    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>faculty_name</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($faculties as $faculty)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $faculty->faculty_name }}</td>
            <td>{{ $faculty->status }}</td>
            <td>
            
                <form action="{{ route('faculties.destroy',$faculty->faculty_id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('faculties.edit',$faculty->faculty_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $faculties->links() !!}
      
@endsection