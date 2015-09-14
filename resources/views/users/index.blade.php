@extends('app')

@section('content')
    <h1>Users</h1>

    @foreach ($users as $user)
        <article>
            <h2>
                <a href="{{ url('/users',$user->id) }}">{{ $user->username }}</a>
            </h2>

            <div class="aboutme">{{ $user->aboutme }}</div>
        </article>
    @endforeach
@stop
