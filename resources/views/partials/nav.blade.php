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
                <li class="active"><a href="/ideas">Ideas</a></li>
                <li><a href="/ideas">Likes</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Test <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li><a href="/tags/{{$category->name}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                    <li><a class="try"> Welcome  {!! Auth::user()->username !!}</a></li>
                    <li @if (Request::is('auth/login/post*')) class="active" @endif>
                        <a href="/auth/logout">Logout</a>
                    </li>

            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
                <li> {!! link_to_action('IdeasController@show', $latest->ideaname, [$latest->id]) !!}</li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
@endif