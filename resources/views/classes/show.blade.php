@extends('layout')
  
@section('content')
<?php 
    
?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Class</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classes.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $class->class_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $class->teacher_id }}
            </div>
        </div>
    </div>
@endsection