@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

    <div class="row mb-5">
        <div class="col-md-12">
            <a href="{{ route('admin.cliente.create') }}">
                <button class="btn btn-primary"><i class="fas fa-user-plus"></i> Novo Cliente</button>
            </a>
            {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-credit-card"></i> Creditar Pontos
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-debitar">
                <i class="fas fa-exchange-alt"></i> PontosTrocar
            </button>--}}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="clientes" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Saldo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>
                                    <div class="btn-group-sm">
                                        <a onclick="setaDadosModal({{$cliente}})" data-toggle="modal" data-target="#modalDebitar">
                                            <button type="button" class="btn btn-primary"><i class="fas fa-exchange-alt"></i></button>


                                        </a>
                                        <a onclick="setaDadosModal2({{$cliente}})" data-toggle="modal" data-target="#modalCreditar">

                                            <button type="button" class="btn btn-primary"><i class="far fa-credit-card"></i></button>

                                        </a>

                                        <a href="{{ route('admin.cliente.show', $cliente->id) }}">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                        </a>

                                        <a href="{{ route('admin.cliente.edit', $cliente->id) }}">
                                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->saldo() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.modal debitar -->
    {!! Form::open(['route' => 'admin.debitotransacao.store']) !!}
        <div class="modal fade" id="modalDebitar" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Debitar Pontos</h4>
                    </div>
                    @csrf
                    <div class="modal-body">
                        <input id="cliente_id" name="cliente_id" type="hidden">
                        <div class="form-group">
                            {{ Form::label('nome_cliente', 'Cliente') }}
                            {{ Form::text('nome_cliente', '', ['class' => 'form-control','readonly', 'id' => 'nome_cliente']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('saldo_cliente', 'Saldo') }}
                            {{ Form::text('saldo_cliente', '', ['class' => 'form-control','readonly', 'id' => 'saldo_cliente']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('produto_id', 'Produto') }}
                            <select name="produto_id" class="form-control select2" style="width: 100%;">
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }} ({{ $produto->pontuacao }} Pontos)</option>
                                @endforeach
                            </select>
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

    <!-- /.modal creditar -->
    {!! Form::open(['route' => 'admin.creditotransacao.atalho']) !!}
        <div class="modal fade" id="modalCreditar" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Creditar Pontos</h4>
                    </div>
    {{--                <form action="{{ route('admin.creditotransacao.store') }}" method="POST">--}}
                        @csrf
                        <div class="modal-body">
                            <input id="cliente_id2" name="cliente_id2" type="hidden">
                            <div class="form-group">
                                {{ Form::label('nome_cliente2', 'Cliente') }}
                                {{ Form::text('nome_cliente2', '', ['class' => 'form-control','readonly', 'id' => 'nome_cliente2']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('saldo_cliente2', 'Saldo') }}
                                {{ Form::text('saldo_cliente2', '', ['class' => 'form-control','readonly', 'id' => 'saldo_cliente2']) }}
                            </div>

                            <div class="form-group">
                                <label>Descrição</label>
                                <input type="text" name="descricao2" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Valor em Dinheiro</label>
                                <input type="text" id="valor_cred"name="valor_cred" onkeyup="setPontos()" class="form-control money">
                            </div>

                            <div class="form-group">
                                <label>Pontos Gerados</label>
                                <input type="number" name="valor2" id="valor2" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Creditar</button>
                        </div>
              {{--  </form>  --}}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    {!! Form::close() !!}

@stop

@section('js')
    <script href="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientes').DataTable();
        } );

        $(document).ready(function () {
            $('.money').mask('###0,00', {reverse: true});
        });


        function setPontos() {
            var din = $('#valor_cred').val();
            din = din.replace(',','.');
            // valfloat = +(din.replace(/,/,'.'));
            pontos = din/5;
            $('#valor2').val(Math.floor(pontos));

            // console.log(Math.floor(pontos),pontos, din);
        }


        function setaDadosModal(cliente) {
            $('#saldo_cliente').val(cliente.saldo);
            $('#nome_cliente').val(cliente.nome);
            $('#cliente_id').val(cliente.id);
            console.log(cliente);
        }

        function setaDadosModal2(cliente) {
            $('#saldo_cliente2').val(cliente.saldo);
            $('#nome_cliente2').val(cliente.nome);
            $('#cliente_id2').val(cliente.id);
            console.log(cliente);
            console.log('2');
        }

    </script>
@stop
