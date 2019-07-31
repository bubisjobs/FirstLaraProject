@extends('layouts.admin')
@section('content')
<div class="col-sm-3">
    <img src="{{ $user->photo ? $user->photo->file: 'http://placehold.it/400x400'  }}" alt="" class="img-responsive img-rounded">
</div>

<div>
    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>
                    {{ $error }}
                </li>
            </ul>
        </div>
    @endforeach

    @endif
</div>
<div class="col-sm-9">
    <h1>Edit Users</h1>

{!! Form::model($user , [ 'method' => 'PATCH', 'action' => ['AdminUserController@update', $user->id],  'files' =>true ]) !!}

    {{-- {!! Form:model($user , ['method' => 'PATCH', 'action'=> ['AdminUserController@update', $user->id ] , 'files'=> true]) !!} --}}
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
       {!! Form::select('role_id', $roles , null, ['class'=> 'col-md-4, form-control']) !!}

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
           {!! Form::submit('Update User', ['class'=> 'btn btn-primary']) !!}
   </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUserController@destroy', $user->id]]) !!}
    <td> {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}</td>
  {!! Form::close() !!}
</div>
@endsection
