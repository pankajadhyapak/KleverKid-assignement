<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Klever Kid Assignmente</title>

    <!-- Bootstrap -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <link href="/css/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('partials.nav')


@yield('page_header')

<div class="container page-content">
    @yield('content')
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.js"></script>
<script src="/js/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
@include('sweet::alert')
@yield('footer')
</body>
</html>