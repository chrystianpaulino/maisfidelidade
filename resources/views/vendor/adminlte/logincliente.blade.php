@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
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

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @yield('content')

            <p class="login-box-msg">Informe o número do seu celular para acessar o painel de cliente.</p>
            <form action="{{ route('cliente.login') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input style="border-radius: 10px;" type="text" name="telefone" class="form-control telefone" value="{{ old('telefone') }}"
                           placeholder="Número">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    <div class="text-center" style="padding-top: 20px;">
                        <button type="input" class="btn btn-outline"
                                style="
                                width: 274px;
                                height: 48px;
                                left: 124px;
                                top: 2292px;
                                color: black;
                                background-color: Transparent;
                                border: 2px solid #000000;
                                box-sizing: border-box;
                                border-radius: 50px;">
                            Entrar</button>
                    </div>
                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });


        jQuery(".telefone")
            .mask("(99)9999-9999?9")
            .focusout(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if(phone.length > 10) {
                    element.mask("(99)99999-999?9");
                } else {
                    element.mask("(99)9999-9999?9");
                }
            });

    </script>
    @yield('js')
@stop
