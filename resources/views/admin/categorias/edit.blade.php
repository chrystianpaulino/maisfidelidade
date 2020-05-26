@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')

    {!! Form::model($cat, array('route' => array('admin.categorias.update', $cat->id), 'method' => 'PATCH')) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="box border">
                <div class="box-body">
                    @csrf
                    <div class="form-group">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('descricao', 'Descrição') }}
                        {{ Form::text('descricao', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection
