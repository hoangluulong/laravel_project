@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('faculties.create') }}"> Create New Faculty</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <!-- 'faculty_name', 'faculty_semester', 'faculty_year', 'status' -->
    <table class="table table-bordered">
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