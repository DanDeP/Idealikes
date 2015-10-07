@extends('app')

@section('content')
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
                <h4 style=text-align:center;>Liked Ideas:</h4>
                <hr/>
                <ul>
                    @foreach($likes as $like)
                        <li><a href="/likes/{{$like->id}}">{{ $like->ideaname }}</a></li>
                        <br/>
                    @endforeach
                </ul>
            </div>
            <div>
                @if(isset($ideaContent))
                    <h1>Idea: {!!$ideaContent->ideaname!!}</h1>

                    <p>{!!$ideaContent->idea!!}</p>
                    {!! Form::model(['method'=>'POST','action' => ['LikesController@rated']]) !!}
                    {!! Form::close() !!}
                @endif

            </div>
        </div>
        <div class="panel-footer">
            Panel footer
        </div>
    </div>
@stop