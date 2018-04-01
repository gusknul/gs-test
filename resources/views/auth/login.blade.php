@extends('layouts.app')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-4">
                <div class="jumbotron">
                    <div class="container">

                        <h3 class="text-center">Inicar sesión</h3>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="control-label col-md-4">Correo</label>
                                <div class=" col-md-8 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input id="email" type="email" class="form-control input-login" name="email"
                                           value="{{ old('email') }}" required autofocus
                                           placeholder="Correo Electrónico">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Contraseña</label>
                                <div class="col-md-8 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input id="password" type="password" class="input-login form-control"
                                           name="password"
                                           required
                                           placeholder="Contraseña">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-success">
                                        Ingresar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
