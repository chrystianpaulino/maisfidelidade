@extends('adminlte::pagecliente')


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Montserrat Alternates' rel='stylesheet'>

    {{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://kit.fontawesome.com/4273a4887c.js"></script>
@stop

@section('content_header')
    <h1>Perfil de Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary" style="border-radius: 20px;">
                <div class="box-body box-profile text-1">

                    <h3 class="profile-username text-center" style="padding-top: 15px; padding-bottom: 15px;"><strong>{{ $cliente->nome }}</strong></h3>

                    <!-- small box -->
                    <div class="small-box" style="border-radius: 5px; background-color: #3ADB84; width: auto !important; max-height: 96px; !important; color: white">
                        <div class="inner">
                            <p></p>

                            <div class="text-center">
                                <span style="font-size: 32px; font-weight: bold !important; color: white !important;"></span>{{ $cliente->saldo() }} pontos
                            </div>

                            <p></p>
                        </div>
                    </div>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Telefone</b> <p class="pull-right">{{ $cliente->telefone }}</p>
                        </li>
                        {{--<li class="list-group-item">
                            <b>email</b> <p class="pull-right">{{ $cliente->email }}</p>
                        </li>--}}
                        <li class="list-group-item">
                            <b>CPF</b> <p class="pull-right">{{ $cliente->cpf }}</p>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>

            @if(!$cliente->msg_boasvindas)
                <a href="{{ route('cliente.edit', $cliente->id) }}">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        Seu cadastro está incompleto, clique aqui para atualizar e ganhar pontos!
                    </div>
                </a>
            @endif
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
                    <div class="panel panel-default" style="border-radius: 20px; padding: 10px;">
                        <div class="table-responsive">
                            <table id="extrato-pontos" class="display table table-responsive text-center" style="width: 100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($transacoes as $transacao)
                                        <tr>
                                            @if($transacao->tipo == 'C')
                                                <td>
                                                    <span style="border-radius: 15px; border: 2px solid #3ADB84; padding: 3px; color: #3ADB84">Crédito</span>
                                                </td>
                                            @else
                                                <td>
                                                    <span style="border-radius: 20px; border: 2px solid #DB3A3A; padding: 5px; color: #DB3A3A">Débito</span>
                                                </td>
                                            @endif
                                            <td>{{ $transacao->produto_id ? $transacao->produto->nome : 'S/P' }}</td>
                                            @if($transacao->tipo == 'C')
                                                <td class="text-success"><strong>{{ $transacao->valor }} Pontos</strong></td>
                                            @else
                                                <td class="text-danger"><strong>{{ $transacao->valor }} Pontos</strong></td>
                                            @endif
                                            <td>{{ $transacao->descricao }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transacao->created_at)->format('d/m/Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
{{--                </div>--}}
{{--            </div>--}}
            {{--<div class="row">
                <div class="col-lg-12 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><sup style="font-size: 20px">M$</sup>{{ $cliente->saldo() }}</h3>

                            <p>Saldo</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
            </div>--}}
{{--            <div class="panel panel-default" style="border-radius: 20px;">--}}
{{--                --}}{{--<ul class="nav nav-tabs" style="border-radius: 20px;">--}}
{{--                    <li class="active"><a href="#extrato" data-toggle="tab">Extrato</a></li>--}}
{{--                </ul>--}}
{{--                <div class="tab-content text-1" style="border-radius: 20px;">--}}
{{--                    <div class="active tab-pane" id="extrato">--}}
{{--                        <div class="box">--}}
{{--                            <div class="box-body">--}}
{{--                                <table id="extrato-pontos" class="display table table-responsive text-center" style="width: 100%">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th></th>--}}
{{--                                            <th>Produto</th>--}}
{{--                                            <th>Valor</th>--}}
{{--                                            <th>Descrição</th>--}}
{{--                                            <th>Data</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        @foreach($transacoes as $transacao)--}}
{{--                                            <tr>--}}
{{--                                                @if($transacao->tipo == 'C')--}}
{{--                                                    <td>--}}
{{--                                                        <span style="border-radius: 15px; border: 2px solid #3ADB84; padding: 3px; color: #3ADB84">Crédito</span>--}}
{{--                                                    </td>--}}
{{--                                                @else--}}
{{--                                                    <td>--}}
{{--                                                        <span style="border-radius: 20px; border: 2px solid #DB3A3A; padding: 5px; color: #DB3A3A">Débito</span>--}}
{{--                                                    </td>--}}
{{--                                                @endif--}}
{{--                                                <td>{{ $transacao->produto_id ? $transacao->produto->nome : 'S/P' }}</td>--}}
{{--                                                @if($transacao->tipo == 'C')--}}
{{--                                                    <td class="text-success"><strong>{{ $transacao->valor }} Pontos</strong></td>--}}
{{--                                                @else--}}
{{--                                                    <td class="text-danger"><strong>{{ $transacao->valor }} Pontos</strong></td>--}}
{{--                                                @endif--}}
{{--                                                <td>{{ $transacao->descricao }}</td>--}}
{{--                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transacao->created_at)->format('d/m/Y') }}</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.tab-content -->--}}
{{--            </div>--}}
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>

@stop

@section('js')
    <script href="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#extrato-pontos').DataTable();
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
@stop
