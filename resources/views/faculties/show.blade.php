@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Faculties</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('faculties.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>faculty name:</strong>
                {{ $faculty->faculty_name }}
            </div>
            <!-- 'faculty_name', 'faculty_semester', 'faculty_year', 'status' -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status:</strong>
                {{ $faculty->status}}
            </div>
        </div>
    </div>
@endsection