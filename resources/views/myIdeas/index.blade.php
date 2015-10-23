@extends('app')

@section('content')
    <div class="test">
    <div class="panel panel-default">
        <div class="panel-body">
            <div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a class="navbar-brand">Sort by:</a>
                        <div id="navbar" class="navbar-collapse collapse">

                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Test <span class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        <li>test</li>

                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">

                <h4 style=text-align:center;>My Ideas:</h4>
                <hr/>
                <ul>
                    @foreach($myIdeas as $idea)
                        <li><a href="/myIdeas/{{$idea->id}}">{{ $idea->ideaname }}</a>
                            <a href="/myIdeas/delete/{{$idea->id}}" style="float:right;" class="btn btn-default">Delete</a>
                            <a href="/ideas/{{$idea->id}}/edit" style="float:right;" class="btn btn-default">Edit</a>
                        </li>
                        <br/>
                    @endforeach
                </ul>
                {!! $myIdeas->render() !!}
            </div>
            <div class="rightbar">
                @if(isset($ideaContent))
                    <h1>Idea: {!!$ideaContent->ideaname!!}</h1>

                    <p>{!!$ideaContent->idea!!}</p>
                    <hr/>
                    <hr/>
                    {!! Form::model($ideaContent,['method'=>'POST','action' => ['CommentsController@addOwnComments']]) !!}
                    {!! Form::hidden('idea_id', $ideaContent->id) !!}

                    @foreach($allComments as $comment)
                        <p>{{$comment->comment}}</p>
                        @if($comment->user_id == Auth::user()->id)
                            <span>By: <a href="/profile"> {{$comment->username}} </a></span>
                        @else
                            <span>By: <a href="/profile/{{$comment->user_id}}"> {{$comment->username}} </a></span>
                        @endif
                        <hr/>
                    @endforeach
                    {!! $allComments->render() !!}
                    <br/>
                    {!! Form::textarea('comments', null, array('required' => 'required','size' => '80x5')) !!}
                    <br/>
                    {!! Form::submit('Submit Comment',array('class' => 'btn btn-primary','name'=>'action')) !!}
                    {!! Form::close() !!}
                @endif

            </div>
        </div>
        <div class="panel-footer">
            @if(isset($ideaView))
                <span>Views:{{$ideaView}}</span>
                <span>All Time Likes:{{$allTimeLikes}}</span>
            @endif
        </div>
    </div>
    </div>
@stop