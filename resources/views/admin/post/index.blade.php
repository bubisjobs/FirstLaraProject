@extends('layouts.admin');
@section('content')
    <h1> Posts</h1>


    <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th>User</th>
                 <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Photo</th>
                <th scope="col">Category</th>

                <th scope="col">created at</th>
                <th scope="col">updated at</th>
                <th> Edit</th>
                <th>Delete</th>

              </tr>
            </thead>
            <tbody>
                @if ($posts)
                @foreach ($posts as $post)
              <tr>


                <th scope="row">{{ $post->id }}</th>
                <th>{{ $post->user->name }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <th> <img height="50" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></th>
                <th scope="col"> {{ $post->category->name }}</th>


                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td> --}}
                {{-- <td> <a href="{{ route('user.edit', $user->id) }}"><button class="btn btn-primary">Edit</button></a></td>
            {!! Form::model($user, ['method'=>'DELETE', 'action'=> ['AdminUserController@destroy', $user->id]]) !!} --}}
              {{-- <td> {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}</td> --}}
           {!! Form::close() !!}

              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
@endsection
