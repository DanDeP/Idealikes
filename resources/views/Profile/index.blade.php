@extends('app')

@section('content')
    @if(isset($user->id) && $user->id != Auth::user()->id)
        <div class="centerit">
            <h1>Username: {{$user->username}}</h1>
            <h3>About Me: </h3>
            <a href="/messages/create/{{$user->id}}" class="btn btn-default">Send Message</a>
        </div>
    @else
        <div class="centerit">
            <h1>Username: {{Auth::user()->username}}</h1>
            <h3>About Me: {{Auth::user()->aboutme}}</h3>

            @if(Auth::user()->aboutme == '')

                {!! Form::model(['method'=>'POST','action' => ['MyProfileController@addBio']]) !!}
                {!! Form::hidden('idea_id', Auth::user()->id) !!}

                {!! Form::textarea('aboutme', null, array('required' => 'required','size' => '80x5')   ) !!}
                <br/>
                {!! Form::submit('Add Bio',array('class' => 'btn btn-primary','name'=>'action')) !!}{!! Form::close() !!}

            @else
                <a href="profile/edit/{{Auth::user()->id}}" style="float:right;" class="btn btn-default">Edit</a>
            @endif
        </div>
    @endif
@stop