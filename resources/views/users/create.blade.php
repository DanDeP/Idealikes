@extends('app')

@section('content')
    <h1>Add New User</h1>

    <hr/>

    {!! Form::open(['url' => 'users']) !!}
    <!--username-->
    <div class="form-group">
        {!! Form::label('username','Username:') !!}
        {!! Form::text('username',null, ['class' => 'form-control']) !!}
    </div>

    <!--password-->
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::text('password',null, ['class' => 'form-control']) !!}
    </div>

    <!--submit-->
    <div class="form-group">
        {!! Form::submit("Add User", ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @include('errors.list')
@stop