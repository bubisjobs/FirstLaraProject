@extends('layouts.admin')
@section('content')

    @if (Session::has('add'))
      <p class="bg-success">{{ session('add') }}</p>


    @elseif (Session::has('delete'))
    <p class="bg-success">{{ session('delete') }}</p>
    @else(Session::has('update'))
    <p class="bg-success">{{ session('update') }}</p>
        @endif

<h1>Users</h1>

{{-- {{  }} --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
         <th scope="col">Images</th>
        <th scope="col">name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Active</th>
        <th scope="col">created at</th>
        <th scope="col">updated at</th>
        <th> Edit</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user )
      <tr>


        <th scope="row">{{ $user->id }}</th>
         <th> <img height="50" src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt=""></th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <th scope="col">{{ $user->role->name }}</th>
        <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>

        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>{{ $user->updated_at->diffForHumans() }}</td> --}}
        <td> <a href="{{ route('user.edit', $user->id) }}"><button class="btn btn-primary">Edit</button></a></td>
    {!! Form::model($user, ['method'=>'DELETE', 'action'=> ['AdminUserController@destroy', $user->id]]) !!}
      <td> {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}</td>
   {!! Form::close() !!}

      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
@endsection
