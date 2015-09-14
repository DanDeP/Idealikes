@extends('app')

@section('content')
    <h1>Add New Idea</h1>

    <hr/>

    {!! Form::open(['url' => 'ideas']) !!}
        @include('Ideas.form',['submitButton'=>'Submit Idea'])
    {!! Form::close() !!}

    @include('errors.list')

@stop