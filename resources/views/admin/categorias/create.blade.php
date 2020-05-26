@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'admin.categorias.store']) !!}
    <div class="box">
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
    {!! Form::close() !!}

@endsection

<script>

    var modals = [];
    @foreach (session('flash_notification', collect())->toArray() as $message)
    modals.push({title: '', text: "{!! $message['message'] !!}", type: "{{ $message['level'] == 'danger' ? 'error' : $message['level'] }}" });
    @endforeach
    if(modals.length > 0) {
        var erros = modals.filter(function(e) { return e.type === 'error'; });
        if(erros.length > 0){
            swal.queue(erros);
        } else {
            swal.queue(modals);
        }
    }
</script>
