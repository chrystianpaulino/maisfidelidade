@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('content_header')
    <h1>Perfil de Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
{{--                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">--}}

                    <h3 class="profile-username text-center">{{ $cliente->nome }}</h3>

                    <p class="text-muted text-center">
                        Cliente
                    </p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Telefone</b> <a class="pull-right">{{ $cliente->telefone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>email</b> <a class="pull-right">{{ $cliente->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CPF</b> <a class="pull-right">{{ $cliente->cpf }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center">Transações</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <a onclick="setaDadosModal({{$cliente}})" class="btn btn-primary m-1" data-toggle="modal" data-target="#modalDebitar">
                                <i class="fas fa-exchange-alt"> </i> Debitar Pontos
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a onclick="setaDadosModal2({{$cliente}})" class="btn btn-primary m-1" data-toggle="modal" data-target="#modalCreditar">
                                <i class="far fa-credit-card"> </i> Creditar Pontos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="row">
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
{{--                        <a href="#" class="small-box-footer">--}}
{{--                            More info <i class="fa fa-arrow-circle-right"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#extrato" data-toggle="tab">Extrato</a></li>
{{--                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>--}}
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="extrato">
                        <div class="box">
                            <div class="box-body">
                                <table id="extrato-pontos" class="display" style="width: 100%">
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
                                                        <span class="badge badge-success" style="background-color: green">Crédito</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-danger" style="background-color: red">Débito</span>
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
                    </div>
                    <!-- /.tab-pane -->
{{--                    <div class="tab-pane" id="timeline">--}}
{{--                        <!-- The timeline -->--}}
{{--                        <ul class="timeline timeline-inverse">--}}
{{--                            <!-- timeline time label -->--}}
{{--                            <li class="time-label">--}}
{{--                        <span class="bg-red">--}}
{{--                          10 Feb. 2014--}}
{{--                        </span>--}}
{{--                            </li>--}}
{{--                            <!-- /.timeline-label -->--}}
{{--                            <!-- timeline item -->--}}
{{--                            <li>--}}
{{--                                <i class="fa fa-envelope bg-blue"></i>--}}

{{--                                <div class="timeline-item">--}}
{{--                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}

{{--                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>--}}

{{--                                    <div class="timeline-body">--}}
{{--                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,--}}
{{--                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity--}}
{{--                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle--}}
{{--                                        quora plaxo ideeli hulu weebly balihoo...--}}
{{--                                    </div>--}}
{{--                                    <div class="timeline-footer">--}}
{{--                                        <a class="btn btn-primary btn-xs">Read more</a>--}}
{{--                                        <a class="btn btn-danger btn-xs">Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <!-- END timeline item -->--}}
{{--                            <!-- timeline item -->--}}
{{--                            <li>--}}
{{--                                <i class="fa fa-user bg-aqua"></i>--}}

{{--                                <div class="timeline-item">--}}
{{--                                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>--}}

{{--                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request--}}
{{--                                    </h3>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <!-- END timeline item -->--}}
{{--                            <!-- timeline item -->--}}
{{--                            <li>--}}
{{--                                <i class="fa fa-comments bg-yellow"></i>--}}

{{--                                <div class="timeline-item">--}}
{{--                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>--}}

{{--                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>--}}

{{--                                    <div class="timeline-body">--}}
{{--                                        Take me to your leader!--}}
{{--                                        Switzerland is small and neutral!--}}
{{--                                        We are more like Germany, ambitious and misunderstood!--}}
{{--                                    </div>--}}
{{--                                    <div class="timeline-footer">--}}
{{--                                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <!-- END timeline item -->--}}
{{--                            <!-- timeline time label -->--}}
{{--                            <li class="time-label">--}}
{{--                        <span class="bg-green">--}}
{{--                          3 Jan. 2014--}}
{{--                        </span>--}}
{{--                            </li>--}}
{{--                            <!-- /.timeline-label -->--}}
{{--                            <!-- timeline item -->--}}
{{--                            <li>--}}
{{--                                <i class="fa fa-camera bg-purple"></i>--}}

{{--                                <div class="timeline-item">--}}
{{--                                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>--}}

{{--                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>--}}

{{--                                    <div class="timeline-body">--}}
{{--                                        <img src="http://placehold.it/150x100" alt="..." class="margin">--}}
{{--                                        <img src="http://placehold.it/150x100" alt="..." class="margin">--}}
{{--                                        <img src="http://placehold.it/150x100" alt="..." class="margin">--}}
{{--                                        <img src="http://placehold.it/150x100" alt="..." class="margin">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <!-- END timeline item -->--}}
{{--                            <li>--}}
{{--                                <i class="fa fa-clock-o bg-gray"></i>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
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
            $('#extrato-pontos').DataTable();
        });

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
