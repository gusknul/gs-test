@extends('layouts.app')



@section('content')
    <div class="lc-block toggled" id="l-login">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="text-center">
                <img style="width: 50%;" src="/img/stamina/stamina.png">
            </div>
            <hr>

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            <div class="lcb-form">
                <div class="row">
                    <p class="">
                        <small><strong>Ingrese su correo para poder restablecer su contraseña</strong></small>
                    </p>
                </div>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required autofocus placeholder="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <button type="submit"
                        class="btn button-login btn-login btn-success bg-red btn-float waves-effect waves-circle waves-float bgm-red">
                    <i class="zmdi zmdi-play icon-login"></i>
                </button>
            </div>
            <div class="lcb-navigation">
                <a href="/" data-ma-action="login-switch" data-ma-block="#l-register"><i
                            class="zmdi zmdi-home"></i> <span>Inicio</span></a>
            </div>
            <div class="row">
                <a href="#" onclick="$('#modalPrivacy').modal();"><p class="lead" style="color: #FFF;">Aviso de
                        privacidad</p></a>
            </div>

        </form>

    </div>
@endsection

@include('partials.privacy')

