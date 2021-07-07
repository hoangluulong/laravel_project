@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List course</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
            </div>
        </div>
    </div>
   <!-- 'course_name', 'course_semester', 'course_year', 'status' -->
    Search class
    <form class="form-inline" action="{{ route('searchclassuser') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
        <select  name="search_id">
                <option value="user_id">user id</option>
                @if ($table == "class_id")
                    <option value="class_id" selected>class id</option>
                @else
                    <option value="class_id">class id</option>
                @endif
            </select>
            <input type="text" class="form-control" id="search" name='search' placeholder="search course" value="{{ $value }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    @if ($size != 0)
        Có {{$size}} kết quả tìm kiếm với từ khóa "{{$value}}"
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>class_id</th>
            <th>user_id</th>
            <th>user_name</th>
            <th>class_name</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($classusers as $classuser)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $classuser->class_id }}</td>
            <td>{{ $classuser->user_id }}</td>
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
        @else
            Không tìm thấy kết quả nào với từ khóa "{{$value}}"
        @endif
@endsection