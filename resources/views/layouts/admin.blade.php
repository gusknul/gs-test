<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>

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
    <link href="{{URL::asset('styles/admin.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="container-fluid">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tiz Car</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ \Illuminate\Support\Facades\Route::getCurrentRoute()->getPath() == "admin/home" ? 'active' : '' }}">
                    <a href="/">Home</a></li>
                <li class="{{ \Illuminate\Support\Facades\Route::getCurrentRoute()->getPath() == "admin/employees" ? 'active' : '' }}">
                    <a href="{{route('admin.employees.index')}}">Empleados</a></li>
                <li><a href="#">Vehiculos</a></li>
                <li><a href="#">Ventas</a></li>
                <li><a href="#">Clientes</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout">Salir</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>
<!-- Production
    <script src="{{asset('public/js/app.js')}}"></script>-->
<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('jquery.serializejson.min.js')}}"></script>
<script src="{{asset('sweetalert2.js')}}"></script>
@yield('scripts')
</body>
</html>