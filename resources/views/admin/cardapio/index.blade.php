@extends('adminlte::page')

@section('title', 'Cardápio')

@section('content_header')
    <h1>Cardápio</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('content')

    <div class="row mb-5">
        <div class="col-md-12">
            <a  class="btn btn-primary text-light" data-toggle="modal" data-target="#dlgProdutos">
                <i class="fas fa-hamburger"></i> Cadastrar Produto
            </a>
            <a  class="btn btn-primary text-light" data-toggle="modal" data-target="#dlgCategorias">
                <i class="fas fa-tags"></i> Cadastrar Categoria
            </a>
        </div>
    </div>
    <br>
    {!! Form::open(['route' => 'admin.produtos.store']) !!}
    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{--                <form class="form-horizontal" id="formProduto">--}}
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">

                    <div class="form-group">
                        {{ Form::label('categoria_id', 'Categoria') }}
                        {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('descricao', 'Descrição') }}
                        {{ Form::text('descricao', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('preco', 'Preço') }}
                        {{ Form::number('preco', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('pontuacao', 'Pontuacao') }}
                        {{ Form::number('pontuacao', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                {{--                </form>--}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => 'admin.categorias.store']) !!}
    <div class="modal" tabindex="-1" role="dialog" id="dlgCategorias">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{--                <form class="form-horizontal" id="formProduto">--}}
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('descricao', 'Descrição') }}
                        {{ Form::text('descricao', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                {{--                </form>--}}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="cardapio" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Pontos</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td></td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->preco }}</td>
                                    <td>{{ $produto->pontuacao }}</td>
                                    <td>{{ $produto->categoria->nome }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@stop

@section('js')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var groupColumn = 5;
            $('#cardapio').DataTable({
                "order": [ 4, 'desc' ],
                // "columnDefs": [{
                //     targets: [ 4 ],
                //     orderData: [ 4, 4 ]
                // }],
                "responsive": true,
                drawCallback: function (settings) {
                    var api = this.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var last = null;

                    api.column(4, { page: 'current' }).data().each(function (group, i) {

                        if (last !== group) {

                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="8" >' + group  + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });
        });
    </script>

@stop
