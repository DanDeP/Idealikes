@extends('app')

@section('content')
    <h1>{{ $ideas->ideaname }}</h1>

    <article>
        {{ $ideas->idea }}
    </article>

    @unless($ideas->tags->isEmpty())

    <h5>Tags:</h5>
    <ul>

        @foreach ($ideas->tags as $idea)
            <li>{{ $idea->name }}</li>
        @endforeach

    </ul>

    @endunless
@stop
