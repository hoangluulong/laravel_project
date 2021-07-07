@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit classuser</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classuser.index') }}">Back</a>
            </div>
        </div>
    </div>
   
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
    
    <?php
        // dd($classes);
    ?>
    <form action="{{ route('classuser.update',$classuser->id) }}" method="POST">
        @csrf
        @method('PUT')
        
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User id</strong>
                <select  name="user_id">
                        
                        @foreach ($users as $user)
                            @if ($user->user_id == $classuser->user_id)
                                <option  value="{{ $classuser->user_id }}" selected>{{ $user->user_name }}</option>
                            @else
                                <option value="{{ $user->user_id }}">{{ $user->user_name}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class name</strong>
                <select  name="class_id">
                        
                        @foreach ($classes as $class)
                            @if ($class->class_id == $classuser->class_id)
                                <option  value="{{ $classuser->class_id }}" selected>{{ $classuser->manyClass[0]['class_name'] }}</option>
                            @else
                                <option value="{{ $class->class_id }}">{{ $class->class_name}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                <input type="text" name="status" value="{{ $classuser->status}}" class="form-control" placeholder="status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
    </form>
@endsection