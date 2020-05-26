@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <style>

    </style>
    <div class="row mb-5">
        <div class="col-md-12">
            <a  class="btn btn-primary text-light" data-toggle="modal" data-target="#dlgProdutos">
                <i class="fas fa-plus"></i> Cadastrar Produto
            </a>
        </div>
    </div>
    <br>

    <div class="box border">
        <div class="box-body">

            <table class="table table-ordered table-hover" id="tabelaProdutos">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Pontuação</th>
{{--                        <th>Preço</th>--}}
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->pontuacao}}</td>
{{--                            <td>{{$produto->preco}}</td>--}}
                            <td>{{$produto->categoria->nome}}</td>
                            <td class="text-right">
                                <a  href="{{ route('admin.produtos.edit', $produto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <a  class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#excluir">
                                    <i class="far fa-trash-alt"></i> Excluir
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                {!! Form::open(array('route' => ['admin.produtos.destroy', $produto->id])) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"><i class="far fa-trash-alt"></i> Excluir</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja excluir?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-sm btn-info btn-block" data-dismiss="modal">Não</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-success btn-block">Sim, quero excluir</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {!! Form::open(['route' => 'admin.produtos.store', 'files' => true]) !!}
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
                                {{ Form::label('categoria_id', 'Categoria') }} <label style="color: red">*</label>
                                {{ Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('nome', 'Nome') }} <label style="color: red">*</label>
                                {{ Form::text('nome', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('descricao', 'Descrição') }}
                                {{ Form::text('descricao', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                            </div>

{{--                            <div class="form-group">--}}
{{--                                {{ Form::label('preco', 'Preço') }}--}}
{{--                                {{ Form::number('preco', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}--}}
{{--                            </div>--}}

                            <div class="form-group">
                                {{ Form::label('pontuacao', 'Pontuacao') }} <label style="color: red">*</label>
                                {{ Form::number('pontuacao', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
                            </div>

{{--                            <div class="custom-file-input">--}}
{{--                                <input type="file" class="custom-file-input" id="arquivo" name="arquivo">--}}
{{--                            </div>--}}

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






@endsection

@section('javascript')

    @foreach (session('flash_notification', collect())->toArray() as $message)
        swal("", "{!! $message['message'] !!}", "{{ $message['level'] == 'danger' ? 'error' : $message['level'] }}");
    @endforeach
@endsection






