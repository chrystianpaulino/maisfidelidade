@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="{{ route('admin.cliente.store') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nome">Telefone  <small class="text-danger" >*</small></label>
                            <input type="text" name="telefone" class="form-control telefone" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <hr>
                        <h4><b>Inserir Valor</b></h4>
                        <div class="form-group">
                            <label>Valor em Dinheiro</label>
                            <input type="text" id="valor_cred" name="valor_cred" onkeyup="setPontos()" class="form-control money">
                        </div>
                        <div class="form-group">
                            <label>Pontos</label>
                            <input type="number" id="valor" name="valor" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Descrição</label>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>--}}

    <script>
        $(document).ready(function () {
            $('.money').mask('###0,00', {reverse: true});
        });
        jQuery(".telefone")
            .mask("(99)9999-9999#9");

        function setPontos() {
            var din = $('#valor_cred').val();
            din = din.replace(',','.');
            // valfloat = +(din.replace(/,/,'.'));
            pontos = din/5;
            $('#valor').val(Math.floor(pontos));

            // console.log(Math.floor(pontos),pontos, din);
        }
    </script>

@stop
