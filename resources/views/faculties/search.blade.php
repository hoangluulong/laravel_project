@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List course</h2>
            </div>
        </div>
    </div>
<div class="menu-search">
    <a class="btn btn-primary" href="{{ route('faculties.index') }}"> Back</a>
    <form class="form-inline" action="{{ route('searchfaculties') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="search" name='search' placeholder="search course" value="{{ $value }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>


    @if ($size != 0)
        Có {{$size}} kết quả tìm kiếm với từ khóa "{{$value}}"
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
        @else
            Không tìm thấy kết quả nào với từ khóa "{{$value}}"
        @endif
@endsection