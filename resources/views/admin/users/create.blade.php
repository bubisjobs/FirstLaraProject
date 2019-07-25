@extends('layouts.admin')



@section('content')
    <h1>Create Users</h1>
    {!! Form::open(['action'=> 'AdminUserController@index' , 'method' => 'POST', 'files'=> true]) !!}
    <div class="form-group">
         {{ Form::label("name", 'Name: ', ['class' => 'control-label']) }}
        {!! Form::text('name', null, ['class'=> 'col-md-4, form-control']) !!}
        @csrf
    </div>
    <div class="form-group">
            {{ Form::label("email", 'Email: ', ['class' => 'control-label']) }}
           {!! Form::text('email', null, ['class'=> 'col-md-4, form-control']) !!}

       </div>

    <div class="form-group">
        {{ Form::label("status", 'Status: ', ['class' => 'control-label']) }}
         {!! Form::select('is_active', [1 => 'Active', 2 =>'Not Active'], null,  ['class'=> 'col-md-4, form-control']) !!}

    </div>
    <div class="form-group">
            {{ Form::label("role_id", 'Role: ', ['class' => 'control-label']) }}
        {!! Form::select('role_id', ['' => 'Choose Options'] + $roles , null, ['class'=> 'col-md-4, form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Upload Image', ['class'=> 'control-label;']) !!}
        {!! Form::file('photo_id') !!}


{{-- @csrf --}}

    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password :', ['class'=> 'control-label']) !!}
        {!! Form::password('password',  ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
            {!! Form::submit('Create User', ['class'=> 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@include('includes.form-error')


@endsection
