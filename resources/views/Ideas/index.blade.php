@extends('app')

@section('content')

    <h1>Idea: {!!$unratedIdeas[0]->ideaname!!}</h1>
    <hr>

    <p>{!!$unratedIdeas[0]->idea!!}</p>
    {!! Form::model($unratedIdeas[0], ['method'=>'POST','action' => ['LikesController@rated']]) !!}
    {!! Form::hidden('idea_id', $unratedIdeas[0]->id) !!}
    {!! Form::submit('Like',array('class' => 'btn btn-primary form-control liked','name'=>'action')) !!}
    {!! Form::submit('Dislike',array('class' => 'btn btn-danger form-control','name'=>'action')) !!}
    {!! Form::close() !!}
@stop

