@extends('layouts.admin')
@section('content')
<h1>Users</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Active</th>
        <th scope="col">created at</th>
        <th scope="col">updated at</th>
      </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user )
      <tr>


        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <th scope="col">{{ $user->role->name }}</th>
        <td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>

        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>{{ $user->updated_at->diffForHumans() }}</td> --}}

      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
@endsection
