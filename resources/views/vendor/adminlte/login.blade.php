@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <style>
        .login-box-body{
            -webkit-box-shadow: 10px 10px 38px -1px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 38px -1px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 38px -1px rgba(0,0,0,0.75);
        }
    </style>
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
{{--            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>--}}
            <a href="#">
{{--                <img src="{{ asset('logo/1000/Mutantes.png') }}" style="max-width: 100%;padding-right: 26px;" alt="">--}}
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Entre para iniciar sua sessão</p>
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" style="border-radius: 10px;" value="{{ old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" style="border-radius: 10px;"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    {{--<div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.remember_me') }}
                            </label>
                        </div>
                    </div>--}}
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block btn-flat text-center"
                            style="
                                /*width: 274px;
                                height: 48px;
                                left: 124px;
                                top: 2292px;*/
                                color: black;
                                background-color: Transparent;
                                border: 2px solid #000000;
                                box-sizing: border-box;
                                border-radius: 50px;"
                        >
                            Entrar
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
{{--            <div class="auth-links">--}}
{{--                <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"--}}
{{--                   class="text-center"--}}
{{--                >{{ trans('adminlte::adminlte.i_forgot_my_password') }}</a>--}}
{{--                <br>--}}
{{--                @if (config('adminlte.register_url', 'register'))--}}
{{--                    <a href="{{ url(config('adminlte.register_url', 'register')) }}"--}}
{{--                       class="text-center"--}}
{{--                    >{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
