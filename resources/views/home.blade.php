@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="">
        <div class="row">
            <div class="col-lg-3 col-xs-6">

            {!! Form::open(['route' => 'admin.debitotransacao.store']) !!}
            <!-- /.modal debitar -->
                <div class="modal fade" id="modal-debitar" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Debitar Pontos</h4>
                            </div>
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <select name="cliente_id" class="form-control select2" style="width: 100%;">
                                        @foreach($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nome }} - {{ $cliente->cpf }} - {{$cliente->saldo()}} pontos </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('produto_id', 'Produto') }}
                                    {{ Form::select('produto_id', $produtos, null ,['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Debitar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            <!-- /.modal inserir -->
                <div class="modal fade" id="modal-default" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Creditar Pontos</h4>
                            </div>
                            <form action="{{ route('admin.creditotransacao.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select name="cliente_id" class="form-control select2" style="width: 100%;">
                                            @foreach($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nome }} - {{ $cliente->cpf }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input type="text" name="descricao" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Pontos</label>
                                        <input type="number" name="valor" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Creditar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">--}}
{{--                            Creditar Pontos--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-debitar">--}}
{{--                            Debitar Pontos--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- small box -->
                <div class="small-box bg-aqua text-left" style="border-radius: 10px;">
                    <div class="inner">
                        <h3>{{ $countClientes }}</h3>
                        <p>Clientes Cadastrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-usb"></i>
                    </div>
{{--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@stop
