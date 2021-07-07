@extends('layout')
@section('content')
<?php 
    
?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Class user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classuser.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User_id</strong>
                {{ $classuser->user_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class_id</strong>
                {{ $classuser->class_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $classuser->status }}
            </div>
        </div>
    </div>
@endsection