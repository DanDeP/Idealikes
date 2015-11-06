<!DOCTYPE html>
<html>
    <head>
        <title>IdeaLikes</title>
        <script src="//code.jquery.com/jquery.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script>
            var hasnotbeenclicked = true;
            $(function(){
                    $(".login,.register").one("click",(function() {
                        if(hasnotbeenclicked){
                            $(".slideleft").animate({"margin-left": "-=25%"}, "slow");
                        }
                        hasnotbeenclicked = false;
                    }));

                $(".logincontainer").hide();
                $(".registercontainer").hide();

                $("a.login").click(function(){
                    $(".registercontainer").hide();
                    $(".logincontainer").toggle("slow").css({
                        'float': 'right',
                        'display': 'inline-block',
                        'position': 'absolute',
//                        'margin-top': '5%',
                        'color': '#ffce0a',
                        'font-weight':'bolder',
                        'font-size':'125%'
                    });
                })

                $("a.register").click(function(){
                    $(".logincontainer").hide();
                    $(".registercontainer").toggle("slow").css({
                        'float': 'right',
                        'display': 'inline-block',
                        'position': 'absolute',
//                        'margin-top': '3%',
                        'color': '#ffce0a',
                        'font-weight':'bold',
                        'font-size':'125%'
                    });
                })
            });
        </script>
        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                background: url("{{URL::asset('img/lightbulbbackground.jpg')}}") center;
                background-size: cover;

            }
            .container {
                /*text-align: center;*/
                display: table-cell;
                vertical-align: middle;
                padding:0px;
            }
            .content {
                /*text-align: center;*/
                /*display: inline-block;*/
                background-color: rgba(0, 0, 0, 0.4);
                width:100%;
                padding: 30px 0px;
                margin: auto 0px;
                overflow: hidden;
            }
            .title {
                font-size: 96px;
                font-weight:bold;
            }
            .btn {
                padding: 14px 24px;
                border: 0 none;
                font-weight: 900;
                letter-spacing: 1px;
                text-transform: uppercase;
            }
            .slideleft{
                text-align: center;
                display: inline-block;
                margin-left: 35%;
            }
            .right{
                float:right;
                display: inline-block;

            }
            .panel-body {
                float:right;
                display: inline-block;
                position: absolute;
                padding-left: 20%;
                /*margin-top: 5%;*/
            }
            .forgotPass {
                color:black;
                font-weight:bolder;
                font-size:150%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="slideleft">
                    <img src="{{URL::asset('img/lightbulb.png')}}" />
                    <div class="title">IdeaLikes</div>
                    <a class="btn btn-default btn-lg register" role="button" href="#">Register</a>
                    <a class="btn btn-default btn-lg login" role="button" href="#">Login</a>
                </div>

                    @include('partials.login')
                    @include('partials.register')


            </div>
        </div>


    </body>
</html>
