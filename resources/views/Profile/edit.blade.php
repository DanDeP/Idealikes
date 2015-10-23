@extends('app')

@section('content')
    <div class="centerit">
        <h1>Username: {{Auth::user()->username}}</h1>

            {!! Form::model(['method'=>'POST','action' => ['MyProfileController@editBio']]) !!}
            {!! Form::hidden('idea_id', Auth::user()->id) !!}

            {!! Form::textarea('aboutme', Auth::user()->aboutme, array('required' => 'required','size' => '80x5')   ) !!}
            <br/>
            {!! Form::submit('Edit Bio',array('class' => 'btn btn-primary','name'=>'action')) !!}
                {!! Form::close() !!}

    </div>
@stop