<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Mutantes Foods</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/">Home </a>
                </li>
                <li @if($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/produtos">Produtos</a>
                </li>
                <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
                    <a class="nav-link" href="/categorias">Categorias </a>
                </li>

            </ul>

        </div>
    </nav>

    <main role="main">
        @hasSection('body')
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


           {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Please check the form below for errors
                </div>
            @endif--}}
            @yield('body')
        @endif
    </main>
</div>

<script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
@foreach (session('flash_notification', collect())->toArray() as $message)
    swal("", "{!! $message['message'] !!}", "{{ $message['level'] == 'danger' ? 'error' : $message['level'] }}");
@endforeach

@hasSection('javascript')
    @yield('javascript')
@endif
</body>
</html>
