@extends('app')

@section('content')

    <h1>Idea: {{$idea}}</h1>
    <hr>
    @foreach ($ideas as $idea)
        <article>
            <h2>
                <a href="{{url('/ideas',$idea->id) }}"> {{ $idea->ideaname }} </a>
            </h2>

            <div class="idea">{{ $idea->idea }}</div>
        </article>

        <button type="button">Like</button>  <button type="button">Dislike</button>
    @endforeach
@stop

