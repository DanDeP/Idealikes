@if (Auth::check())
    <script type="text/javascript">

    </script>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">IdeaLikes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                {{--<li><a class="try"> Welcome  {!! Auth::user()->username !!}</a></li>--}}
                <li class="active"><a href="/rate">New Ideas</a></li>
                <li><a href="/likes">Liked Ideas</a></li>
            </ul>

            {{--<ul class="nav navbar-nav">      This will no longer be apart of the nav bar. Will need for the likes view--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Test <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--@foreach($categories as $category)--}}
                            {{--<li><a href="/tags/{{$category->name}}">{{ $category->name }}</a></li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome  {!! Auth::user()->username !!} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/messages">Messages</a></li>
                        <li><a href="/profile">My Profile</a></li>
                        <li><a href="/myIdeas">My Ideas</a></li>
                        <li><a href="/ideas/create">Submit Idea</a></li>
                        <li @if (Request::is('auth/login/post*')) class="active" @endif>
                            <a href="/auth/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li class="dropdown">--}}
                    {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="{{URL::to('messages')}}">Messages @include('messenger.unread-count')</a></li>--}}
                {{--<li><a href="{{URL::to('messages/create')}}">New Message</a></li>--}}
                        {{--<li><a href="/messages">Messages</a></li>--}}
                {{--<li><a href="/messages/create">Send Message</a></li>--}}
                        {{--<li><a href="/profile">My Profile</a></li>--}}
                        {{--<li><a href="/myIdeas">My Ideas</a></li>--}}
                        {{--<li><a href="/ideas/create">Submit Idea</a></li>--}}
                        {{--<li @if (Request::is('auth/login/post*')) class="active" @endif>--}}
                            {{--<a href="/auth/logout">Logout</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}


            <!--<ul class="nav navbar-nav navbar-right">
                <li> {{--link_to_action('IdeasController@show', $latest->ideaname, [$latest->id])--}} </li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
@endif