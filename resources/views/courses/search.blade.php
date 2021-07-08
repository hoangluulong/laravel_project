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
    <a class="btn btn-primary" href="{{ route('courses.index') }}"> Back</a>
    <form class="form-inline" action="{{ route('search') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
        <select  name="search_id" id="search_id">
                <option value="course_name">course name</option>
                @if ($table == "course_semester")
                    <option value="course_semester" selected>course semester</option>
                @else
                    <option value="course_semester">course semester</option>
                @endif

                @if ($table == "course_year")
                    <option value="course_year" selected>course year</option>
                @else
                    <option value="course_year">course year</option>
                @endif
            </select>
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
        @else
            Không tìm thấy kết quả nào với từ khóa "{{$value}}"
        @endif
@endsection