@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List lop hoc</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('classuser.create') }}"> Create New class_user</a>
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
            <th>class_id</th>
            <th>user_name</th>
            <th>class_name</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($classusers as $classuser)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $classuser->class_id }}</td>
            <td>{{ $classuser->manyUser[0]['user_name'] }}</td>
            <td>{{ $classuser->manyClass[0]['class_name'] }}</td>
            <td>{{ $classuser->status }}</td>
            <td>
                <form action="{{ route('classuser.destroy',$classuser->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('classuser.edit',$classuser->id) }}">Edit</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $classusers->links() !!}
      
@endsection