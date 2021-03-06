<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />    <title>¡Bienvenido a mi tiendita!</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="{{ asset('css/material-kit.min.css')}}" rel="stylesheet" />

</head>
<body>
  <div class="flex-center position-ref full-height">
  </div>
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate"> 
        <a class="navbar-brand" href="{{ url('/') }}">
        Shopapp </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}" >
              <i class="material-icons">home</i> Inicio
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}" onclick="scrollToDownload()">
              <i class="material-icons">person</i> Inicia sesión
            </a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}" onclick="scrollToDownload()">
              <i class="material-icons">person_add</i> Regístrate
            </a>
          </li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url(' {{ asset('/img/profile_city.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">¡Aquí encontrarás todo lo que necesitas!</h1>
          <h4>Somos la mejor opción</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Mira como usar nuestro sitio
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">¿Por qué elegirnos?</h2>
            <h5 class="description">Porque tenemos a Chicoterry</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Soporte técnico</h4>
                <p>Las 24 hrs</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Tenemos certificado SSL</h4>
                <p>Con nosotros estarás seguro</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Nos preocupamos por ti</h4>
                <p>Si no encuentras un producto, avísanos y mándamos a chicoterry personalmente</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row ">
            <div class="col-md-4 offset-md-4">
        <form method="get" action="{{ url('/search')}}" class="form-inline">
            <input id="search" type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query">
            <button class="btn btn-primary btn-just-icon" style="margin-left: 10px;">
                <i class="material-icons">search</i>
            </button>
        </form>
            </div>
        </div>
      <div class="section text-center">
        <h2 class="title">Lista de categorías</h2>

        <div class="team">
          <div class="row">
            <style>

            </style>
            @foreach ($categories as $categoria)

            <div class="col-sm-4 py-2">

              <div class="card card-body h-100" >
                <h4 class="card-title"><a href="{{ url('categories/'.$categoria->id) }}"> {{ $categoria->name }}</a></h4>
                <img class="card-img-top" src="{{ $categoria->featured_image_url }}">
                <br>
                <div class="card-body">
                  <p class="card-text">{{ $categoria->description }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">

          </div>
          </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿Aún no te has registrado?</h2>
            <h4 class="text-center description">Prueba nuestro servicio no te arrepentirás. Dejános tus datos</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Duda o aclaración</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Eviar mensaje
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes.footer')
</body>
<script src="{{ asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>
<script src="{{ asset('js/typeahead.bundle.js')  }}" type="text/javascript"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    $(function(){

        var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,

            //local: ['hola','mundo','prueba1','prueba2','abcde']
            prefetch: '{{ url('/products/json') }}'

        });

        $('#search').typeahead({
            hint: true,
            highlight: true,
            minLength:1
        }, {
            name: 'products',
            source: products
        });

    });

</script>
</html>
