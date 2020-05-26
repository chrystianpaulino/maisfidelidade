@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')

    <div class="row mb-5">
        <div class="col-md-12">
            <a  href="{{ route('admin.categorias.create') }}" class="btn btn btn-primary">
                <i class="fas fa-plus"></i> Cadastrar categoria
            </a>
        </div>
    </div>
    <br>

    <div class="box border">
        <div class="box-body">
            @if(count($cats) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome da Categoria</th>
                        <th>Descrição da Categoria</th>
                        <th class="text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cats as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->nome}}</td>
                            <td>{{$cat->descricao}}</td>
                            <td class="text-right">
                                <a  href="{{ route('admin.categorias.edit', $cat->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <a  class="btn btn-sm btn-danger text-light" data-toggle="modal" data-target="#excluir">
                                    <i class="far fa-trash-alt"></i> Excluir
                                </a>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    {!! Form::open(array('route' => ['admin.categorias.destroy', $cat->id])) !!}
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>




@endsection
