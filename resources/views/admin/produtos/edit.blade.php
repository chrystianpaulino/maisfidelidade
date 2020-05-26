@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produto</h1>
@stop

@section('content')
    {!! Form::model($produto, array('route' => array('admin.produtos.update', $produto->id), 'method' => 'PATCH',  'files' => true)) !!}
        <div class="container">
            <div class="row">
                <div class="box border col-md-4">
                    <div class="box-body col-md-4">
                        @csrf
{{--                        <div class="col-md-12">--}}
{{--                            <img class="card-img-top thumbnail" src="/storage/{{ $produto->foto }}">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            {{ Form::label('categoria_id', 'Categoria') }}
                            {{ Form::select('categoria_id', $categorias, $produto->categoria_id, ['class' => 'form-control', 'autocomplete' => 'off']) }}
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

{{--                        <div class="custom-file-input">--}}
{{--                            <input type="file" class="custom-file-input" id="arquivo" name="arquivo">--}}
{{--                        </div>--}}
                        <br>

                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>

@endsection
