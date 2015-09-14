<!DOCTYPE html>

<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

</head>
<body>

<div class="container">
    @include('partials.flash')

    @yield('content')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    @yield('footer')

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Dan
 * Date: 7/20/2015
 * Time: 4:18 PM
 */