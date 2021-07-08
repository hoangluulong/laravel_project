@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Class</h2>
        </div>
    </div>
</div>
   <hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('classuser.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User name</strong>
                <select name="user_id" class="selected">
                        <option selected></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->user_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class name</strong>
                <select name="class_id" class="selected">
                        <option selected></option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->user_id }}">{{ $class->class_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status</strong>
                <input type="text" name="status" class="form-control" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
   
</form>
@endsection