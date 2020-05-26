<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mutantes Foods | Programa de Pontos</title>
{{--    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">--}}
{{--    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">--}}

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('delicius-template/css/style.css') }}">
    <script src="https://kit.fontawesome.com/4273a4887c.js"></script>
</head>

<body>
<!--banner-->

<section id="banner">
    <div class="pelicula-roxa">
        <div class="bg-color">
            <header id="header">
                <div class="container">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="#about">Sobre nós</a>
                        <a href="#menu-list">Programa de Pontos</a>
                        <a href="{{route('paginaLoginCliente')}}">Área do Cliente</a>
                        <a href="{{route('login')}}">Área do Administrador</a>
                    </div>
                    <!-- Use any element to open the sidenav -->

                    <span onclick="openNav()" class="pull-right menu-icon">☰</span>
                    <a style="margin-right: 10px;" class="pull-right menu-icon mr-5" href="{{route('paginaLoginCliente')}}">
                        <button class="btn btn-success" style="background-color: #181818; border: 1px solid #181818;"><i class="fa fa-user"></i> Área do Cliente</button>
                    </a>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="inner text-center">
                        <h1 class="logo-name"><img src="{{ asset('logo/1000/Mutantes.png') }}" style="max-width: 80%" alt=""></h1>
                        <h2>Programa de Pontos</h2>
                        {{--                    <p>Specialized in Indian Cuisine!!</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- / banner -->
<!--about-->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center marb-35">
                <h1 class="header-h">Mutantes Foods</h1>
                <p class="header-p">Para tornar a experiência de ser um cliente Mutantes melhor ainda, conheça nosso Programa Fidelidade. Um sistema que vai te presentear com nossos produtos de acordo com a quantidade de pontos que acumular.</p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <h2 class="heading">Programa de Pontos</h2>
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero impedit inventore culpa vero accusamus in nostrum dignissimos modi, molestiae. Autem iusto esse necessitatibus ex corporis earum quaerat voluptates quibusdam dicta!</p>--}}
                        <div class="details-list">
                            <ul>
                                <li style="margin-top: 20px; font-weight: bold"><i class="fa fa-check"></i>Como acumular pontos?</li>
                                A cada R$5,00 em compra você soma 1 ponto.

                                <li style="margin-top: 20px; font-weight: bold"><i class="fa fa-check"></i>Como faço para se cadastrar no programa e somar pontos?</li>
                                É simples! Basta se dirigir ao Caixa e solicitar o cadastro na hora do pagamento.

                                <li style="margin-top: 20px; font-weight: bold"><i class="fa fa-check"></i>É preciso algum documento para o cadastro?</li>
                                Não! Apenas informar o número do celular.

                                <li style="margin-top: 20px; font-weight: bold"><i class="fa fa-check"></i>O programa será apenas para resgate de produtos por pontos?</li>
                                Não! Haverão promoções que apenas os participantes do nosso programa de fidelidade

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('images/tapioca.jpeg') }}" alt="" class="img-responsive">
{{--                    <img src="img/res01.jpg" alt="" class="img-responsive">--}}
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>
<!--/about-->
<!-- menu -->
<section id="menu-list" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center marb-35">
                <h1 class="header-h">Programa de Pontos</h1>
                <p class="header-p">Seja nosso cliente, acumule pontos e troque por produtos!</p>
            </div>

            <div class="col-md-12  text-center" id="menu-flters">
                <ul>
                    <li><a class="filter active" data-filter=".menu-restaurant">Todos os Produtos</a></li>
                </ul>
            </div>

            <div id="menu-wrapper">
                @foreach($produtos as $produto)
                    <div class="menu-restaurant">
                        <span class="clearfix">
{{--                            <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Food Item Name</a>--}}
                            <a class="menu-title" href="#" {{--data-meal-img="{{ asset('delicius-template/img/restaurant/rib.jpg') }}"--}}>{{ $produto->nome }}</a>
                            <span style="    left: 114px;right: 89px;" class="menu-line"></span>
                            <span class="menu-price">{{ $produto->pontuacao }} Pontos</span>
                        </span>
                        <span class="menu-subtitle">{{ $produto->descricao }}</span>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
<!--/ menu -->
<!-- footer -->
<footer class="footer text-center">
    <div class="footer-top">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 text-center">
                <div class="widget">
                    <h4 class="widget-title"><img src="{{ asset('logo/1000/Mutantes.png') }}" style="max-width: 246px" alt=""></h4>
                    <address>Av João da e Escocia, 259, Nova Betania<br>Mossoró/RN</address>
                    <div class="social-list">
                        <a href="https://www.instagram.com/mutantesfoods/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/mutantesfoods/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </div>
                    <p class="copyright clear-float">
                        © Codum. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->

<script src="{{ asset('delicius-template/js/jquery.min.js') }}"></script>

<script src="{{ asset('delicius-template/js/jquery.easing.min.js') }}"></script>

<script src="{{ asset('delicius-template/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('delicius-template/js/custom.js') }}"></script>

{{--<script src="{{ asset('delicius-template/js/contactform.js') }}"></script>--}}

</body>

</html>
