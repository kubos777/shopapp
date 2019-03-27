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
  </div>
<style>
           .upload-btn-wrapper {
            position: relative;
            display: inline-block;

            margin: 100px;
          }

          .btnfile {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
          }

          .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            opacity: 0;
            width: 133px;
            height: 43px;
          }
        </style>
  <div class="main main-raised">
    <div class="container ">

      <div class="section ">
        <h2 class="title text-center">Imágenes del producto: {{ $product->name  }}</h2>
        <div class="team">

          <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <!--<input name="photo" type="file"  required>-->
            
            <div class="upload-btn-wrapper">
              <button class="btnfile">Subir foto</button>
              <input type="file" name="photo" required />
            </div>

            <button type="submit" class="btn btn-primary btn-round">Subir nueva imágen</button>
            <a class="btn btn-default btn-round" href="{{ url('/admin/products/') }}">Volver al listado de productos</a>
          </form>


        <div class="row">
          @foreach ($images as $image)

          <div class="col-md-4">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
              <div class="card-body">
                <form method="POST" action="">
                  @csrf
                  @method('DELETE')

                  <input type="hidden" name="image_id" value="{{ $image->id }}">
                  
                  <button type="submit" class="btn btn-danger">Eliminar</button>

                  @if ($image->featured)
                  <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i> 
                  </button >
                  @else
                  <a href="{{ url('admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i> 
                  </a>
                  @endif
                </form>
              </div>
            </div>
          </div>

          @endforeach
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
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
