@extends('app')

@section('content')
    <h1>{{ $users->username }}</h1>

    <article>
        {{ $users->aboutme }}
    </article>
@stop
