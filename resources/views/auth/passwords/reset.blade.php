@extends('layouts.app')




@section('content')
    <div class="lc-block toggled" id="l-login">
        <div class="text-center">
            <img style="width: 50%;" src="/img/stamina/stamina.png">
        </div>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="lcb-form">
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
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

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirmar contraseña" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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