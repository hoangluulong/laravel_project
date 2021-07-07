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
    <form class="form-inline" action="{{ route('searchclass') }}" method="get">
        <div class="form-group mx-sm-3 mb-2">
        <select  name="search_id">
                <option value="class_name">class name</option>
                @if ($table == "course_name")
                    <option value="course_name" selected>course name</option>
                @else
                    <option value="course_name">course name</option>
                @endif
                @if ($table == "faculty_name")
                    <option value="faculty_name" selected>faculty name</option>
                @else
                    <option value="faculty_name">faculty name</option>
                @endif
                @if ($table == "teacher_id")
                    <option value="teacher_id" selected>teacher id</option>
                @else
                    <option value="teacher_id">teacher id</option>
                @endif

                @if ($table == "course_id")
                    <option value="course_id" selected>course id</option>
                @else
                    <option value="course_id">course id</option>
                @endif
                @if ($table == "faculty_id")
                    <option value="faculty_id" selected>faculty id</option>
                @else
                    <option value="faculty_id">faculty id</option>
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
        @else
            Không tìm thấy kết quả nào với từ khóa "{{$value}}"
        @endif
@endsection