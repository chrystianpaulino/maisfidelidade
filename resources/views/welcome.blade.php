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

    <link href='https://fonts.googleapis.com/css?family=Montserrat Alternates' rel='stylesheet'>

{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://kit.fontawesome.com/4273a4887c.js"></script>
</head>

<body>
<!--banner-->
<section id="banner">
    <div class="">
        <div class="bg-color">
            <header id="header" class="pelicula-preta">
                <div class="container text-1 d-flex align-items-center">
                    {{--<div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="#about">Sobre nós</a>
                        <a href="#menu-list">Programa de Pontos</a>
                        <a class="btn-login" href="{{route('paginaLoginCliente')}}">Login</a>
                        <a href="{{route('login')}}">Área do Administrador</a>
                    </div>
                    <!-- Use any element to open the sidenav -->
                    <span onclick="openNav()" class="pull-right menu-icon">☰</span>--}}
                    <a class="pull-right menu-icon text-1" style="padding-right: 20px" href="{{route('paginaLoginCliente')}}">
                        <button class="btn-login text-1">Login <i class="fa fa-user"></i></button>
                    </a>
                    <a class="pull-left" style="padding-left: 20px; padding-top: 10px;">
                        <h4 class="widget-title"><img src="{{ asset('images/logoWhite.png') }}" style="max-width: 99px; max-height: 48px" alt=""></h4>
                    </a>
                    {{--<a style="margin-right: 30px; margin-top: 25px;" class="pull-right menu-icon">
                        <span class="text-1" style="color: #FFFFFF">Trocar pontos</span>
                    </a>
                    <a style="margin-right: 30px; margin-top: 25px" class="pull-right menu-icon">
                        <span class="text-1" style="color: #FFFFFF">Como funciona</span>
                    </a>--}}
                </div>
            </header>
            <div class="inner text-left center">
                <div class="container center" style="padding: 40px;">
                    <div class="" style="padding-bottom: 25px;">
                        <span class="banner-title">Suas compras agora valem mais</span>
                    </div>
                    <div class="" style="padding-bottom: 25px;">
                        <span class="banner-subtitle">Acumule pontos e troque por produtos exclusivos da nossa loja</span>
                    </div>
                    <div class="" style="padding-bottom: 25px;">
                        <button class="btn text-1 btn-banner"> Saber mais</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / banner -->

<!-- como funciona -->
<section id="about" class="section-padding">
    <div class="container">
{{--        <div class="row">--}}
            <div class="col-md-12 text-center marb-35">
                <h1 class="header-h">Como funciona</h1>
                <img src="{{ asset('images/svg.png') }}" alt="" class="img-responsive" style="text-align: center; display: inline;">
            </div>
            <div class="col-md-12">
                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                        <div class="details-list">
                            <div class="col-md-12">
                                <div class="col-md-3 d-none d-md-inline-block ml-md-4" style="height: 88px; width: 88px; border-radius: 50%; border: 5px solid black; justify-content: center; align-items: center; display: flex; z-index: 2; background-color: white">
                                    <img src="{{ asset('images/bag.png') }}" alt="" class="img-responsive d-none d-md-inline-block ml-md-4" style="margin: auto">
                                </div>
                                <div class="col-md-9" style="display: flex; flex-direction: column">
                                    <span class="banner-subtitle" style="color: #000000">Compre na nossa loja</span>
                                    <span class="text-1 pt-5">A cada R$ 5,00 em compras, você receberá 1 ponto na sua conta cliente.</span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4" style="margin-top: 20px;">
                                <div class="col-md-3 d-none d-md-inline-block ml-md-4" style="height: 88px; width: 88px; border-radius: 50%; border: 5px solid black; justify-content: center; align-items: center; display: flex; z-index: 2; background-color: white">
                                    <img src="{{ asset('images/people.png') }}" alt="" class="img-responsive d-none d-md-inline-block ml-md-4" style="margin: auto">
                                </div>
                                <div class="col-md-9" style="display: flex; flex-direction: column">
                                    <span class="banner-subtitle" style="color: #000000">Faça login na plataforma</span>
                                    <span class="text-1">Não precisa de cadastro algum, o seu acesso é feito apenas com seu número.</span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4" style="margin-top: 20px;"> {{-- Todos elementos da div ficam em colunas --}}
                                <div class="col-md-3 d-none d-md-inline-block ml-md-4" style="height: 88px; width: 88px; border-radius: 50%; border: 5px solid black; justify-content: center; align-items: center; display: flex; z-index: 2; background-color: white">
                                    <img src="{{ asset('images/gift.png') }}" alt="" class="img-responsive d-none d-md-inline-block ml-md-4" style="margin: auto">
                                </div>

                                <div class="col-md-9" style="display: flex; flex-direction: column"> {{-- Todos elementos da div ficam em colunas --}}
                                    <span class="banner-subtitle" style="color: #000000">Troque seus pontos</span>
                                    <span class="text-1 pt-5">Quando atingir o número suficiente você poderá trocar por produtos de sua escolha.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <img src="{{ asset('images/illustra.png') }}" alt="" class="img-responsive">
                </div>
            </div>
{{--        </div>--}}
    </div>
</section>
<!-- /como funciona -->

<!-- cards -->
<section id="menu-list" class="section-padding text-left" style="background: #E1E1E1">
    <div class="container-card">
        <div class="col-md-12 text-center marb-35">
            <h1 class="header-h">Últimas ofertas</h1>
            <img src="{{ asset('images/svg.png') }}" alt="" class="img-responsive" style="text-align: center; display: inline;">
        </div>

        @foreach($produtos as $produto)
            <div class="movie-card">
            <div class="movie-header" style="background: url({{asset('images/Rectangle14.png')}}); background-size: cover;">
            </div><!--movie-header-->
            <div class="movie-content">
                <div class="movie-content-header">
                    <h3 class="movie-title text-1">{{$produto->nome}}</h3>
                </div>
                <div class="movie-info text-center">
                    <div class="info-section">
                        <label>PONTUAÇÃO</label>
                        <span class="text-1">{{ $produto->pontuacao }} pontos</span>
                    </div><!--date,time-->
                    <div class="info-section">
                        <label></label>
                        <span></span>
                    </div><!--screen-->
                    <div class="info-section">
                        <label></label>
                        <span></span>
                    </div><!--row-->
                    <div class="info-section">
                        <label></label>
                        <span></span>
                    </div><!--seat-->
                </div>
            </div><!--movie-content-->
        </div><!--movie-card-->
        @endforeach

        {{--<div class="movie-card">
            <div class="movie-header" style="background: url({{asset('images/Rectangle16.png')}}); background-size: cover;">
            </div><!--movie-header-->
            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="imax-logo"></div>
                </div>
                <div class="movie-info">
                    <div class="info-section">
                        <label>Date & Time</label>
                        <span>Sun 8 Sept - 10:00PM</span>
                    </div><!--date,time-->
                    <div class="info-section">
                        <label>Screen</label>
                        <span>03</span>
                    </div><!--screen-->
                    <div class="info-section">
                        <label>Row</label>
                        <span>F</span>
                    </div><!--row-->
                    <div class="info-section">
                        <label>Seat</label>
                        <span>21,22</span>
                    </div><!--seat-->
                </div>
            </div><!--movie-content-->
        </div><!--movie-card-->

        <div class="movie-card">
            <div class="movie-header" style="background: url({{asset('images/Rectangle22.png')}}); background-size: cover;">
            </div><!--movie-header-->
            <div class="movie-content">
                <div class="movie-content-header">
                    <a href="#">
                        <h3 class="movie-title">Man of Steel</h3>
                    </a>
                    <div class="imax-logo"></div>
                </div>
                <div class="movie-info">
                    <div class="info-section">
                        <label>Date & Time</label>
                        <span>Sun 8 Sept - 10:00PM</span>
                    </div><!--date,time-->
                    <div class="info-section">
                        <label>Screen</label>
                        <span>03</span>
                    </div><!--screen-->
                    <div class="info-section">
                        <label>Row</label>
                        <span>F</span>
                    </div><!--row-->
                    <div class="info-section">
                        <label>Seat</label>
                        <span>21,22</span>
                    </div><!--seat-->
                </div>
            </div><!--movie-content-->
        </div><!--movie-card-->--}}

    </div>
</section>
<!--/ cards -->

<!-- cards 2 -->
    {{--<section id="menu-list" class="section-padding text-left" style="background: #E1E1E1">
        <div class="container-card">

            <div class="col-md-12 text-center marb-35">
                <h1 class="header-h">Últimas ofertas</h1>
                <img src="{{ asset('images/svg.png') }}" alt="" class="img-responsive" style="text-align: center; display: inline;">
            </div>

            <div class="container-fluid">
                <div class="row col-md-12">
                    <div class="scrollmenu">
                        @foreach($produtos as $produto)
                            <div class="movie-card">
                                <div class="movie-header" style="background: url({{asset('images/Rectangle14.png')}}); background-size: cover;">
                                </div><!--movie-header-->
                                <div class="movie-content">
                                    <div class="movie-content-header">
                                        <h3 class="movie-title text-1">{{$produto->nome}}</h3>
                                    </div>
                                    <div class="movie-info text-center">
                                        <div class="info-section">
                                            <label>PONTUAÇÃO</label>
                                            <span class="text-1">{{ $produto->pontuacao }} pontos</span>
                                        </div><!--date,time-->
                                        <div class="info-section">
                                            <label></label>
                                            <span></span>
                                        </div><!--screen-->
                                        <div class="info-section">
                                            <label></label>
                                            <span></span>
                                        </div><!--row-->
                                        <div class="info-section">
                                            <label></label>
                                            <span></span>
                                        </div><!--seat-->
                                    </div>
                                </div><!--movie-content-->
                            </div><!--movie-card-->
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>--}}
<!--/ cards 2 -->

<!-- footer -->
<footer class="footer text-center" style="color: black;">
    {{--<div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-1 pt-5">Não precisa de cadastro algum, o seu acesso é feito apenas com seu número.</span>

            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>--}}
    <div class="footer-top">
        <div class="container">
{{--            <div class="row">--}}
                <div class="col-md-12">
                    <div class="col-md-6" style="align-content: center">
                        <div class="widget text-left">
                            <span class="header-h" style="color: white">Chega de cartões fidelidade</span>
                            <p>
                                <span class="text-1" style="color: white; padding-top: 20px">A Mais Pontos é o melhor jeito de fidelizar o seu cliente, através de pontos de compra</span>
                            </p>
                            <button class="btn text-1 btn-outline" style="color:white;"> Saber mais</button>
                        </div>
                    </div>
                    <div class="col-md-6" style="align-content: center">
                        <div class="widget">
                            <h4 class="widget-title"><img src="{{ asset('images/logoWhite.png') }}" style="max-width: 246px" alt=""></h4>
                        </div>
                    </div>
                </div>
{{--            </div>--}}

            <div class="col-md-12 text-center">
                <span class="text-1" style="color: #ffffff; padding-top: 10px">Mais Pontos © Todos os direitos reservados. 2020</span>
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
