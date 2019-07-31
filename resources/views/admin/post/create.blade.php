@extends('layouts.admin');
@section('content')
    <h1> Create Posts</h1>

    {!! Form::open(['method'=> 'POST', 'action'=> 'AdminPostController@store', 'files'=> true]) !!}
    <div class="form-group">
            {{ Form::label('title', 'Title: ', ['class' => 'control-label']) }}
           {!! Form::text('title', null, ['class'=> 'col-md-4, form-control']) !!}

       </div>
       <div class="form-group">
            {{ Form::label('caetgory', 'Category: ', ['class' => 'control-label']) }}
            {!! Form::select('category_id', ['please select'] + $cat , null, ['class'=> 'form-control']) !!}

       </div>
       <div class="form-group">
            {!! Form::label('photo_id', 'Image Upload: ', ['class'=>'control-label']) !!}
            {!! Form::file('photo_id') !!}
        </div>
       <div class="form-group">
            {{ Form::label('body', 'Body: ', ['class' => 'control-label']) }}
           {!! Form::textarea('body', null, ['class'=> 'col-md-4, form-control']) !!}

       </div>
       {{-- <div class="form-group">
            {{ Form::label('caetgory', 'Category: ', ['class' => 'control-label']) }}
            {!! Form::select('category_id', [1 => 'Active', 2 =>'Not Active'], null, ['class'=> 'form-control']) !!}

       </div> --}}

       <div class="form-group">
            {!! Form::submit('Create Post', ['class'=> 'btn btn-primary']) !!}
       </div>


       {!! Form::close() !!}

@endsection
