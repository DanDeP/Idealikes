@extends('app')

@section('content')
    <h1>Edit: {!! $idea->ideaname !!}</h1>
<!--can use, url, action, or route. 'url' => 'ideas/' . $idea->id -->
    {!! Form::model($idea, ['method'=>'PATCH','action' => ['IdeasController@update', $idea->id]]) !!}
        @include('Ideas.form',['submitButton'=>'Update Idea'])
    {!! Form::close() !!}

            <!--You will always have access to an errors variable.-->

    @include('errors.list')
@stop