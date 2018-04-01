@extends('layouts.app')

@section('content')



    <div class="lc-block toggled" id="l-login">
        <div class="text-center">
            <img style="width: 50%;" src="/img/stamina/stamina.png">
        </div>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="lcb-form">
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input id="name" placeholder="nombre(s)" type="text" class="form-control" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        <input id="name" placeholder="apellido(s)" type="text" class="form-control" name="last_name"
                               value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-map"></i></span>
                    <div class="fg-line {{ $errors->has('state') ? 'has-error' : '' }}">

                        <select id="state" placeholder="Estado" class="form-control" name="state"
                                value="{{ old('state') }}" required autofocus>
                            <option value="">Seleccione estado</option>
                            @foreach(\futuremakers\Model\State::all() as $state)
                                <option value="{{$state->id}}" {{ old('state') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('state'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input id="name" placeholder="Correo Electronico" type="text" class="form-control" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-smartphone-android"></i></span>
                    <div class="fg-line {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <input id="name" placeholder="telefono" type="text" class="form-control" name="phone"
                               value="{{ old('phone') }}" required autofocus>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-male-female"></i></span>
                    <div class="fg-line">
                        <div class="select {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <select id="name" placeholder="sexo" type="text" class="form-control" name="gender"
                                    value="{{ old('gender') }}" required autofocus>
                                <option value="">Sexo</option>
                                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Masculino</option>
                                <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Femenino</option>
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required
                               placeholder="contraseña">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="confirmar contraseña" required>
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
