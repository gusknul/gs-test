<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--<link href="/css/app.css" rel="stylesheet">-->

<!--Production
    <link href="{{URL::asset('public/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/app_1.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/css/app_2.min.css')}}" rel="stylesheet">
    -->

    <link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="container-fluid">
@yield('content')
<!-- Production
    <script src="{{asset('public/js/app.js')}}"></script>-->
<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
