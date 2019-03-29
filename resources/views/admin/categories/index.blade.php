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

  <div class="main main-raised">
    <div class="container ">

      <div class="section ">
        <h2 class="title text-center">Lista de categorías</h2>
        <div class="team">
          <div class="row">

            <a href="{{ url('/admin/categories/create/') }}" class="btn btn-success">Nuevo categoría</a>
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Nombre</th>
                  <th class="text-center ">Descripción</th>
                  <th class="text-center" >Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categorias as $categoria)

                <tr>
                  <td class="text-center">{{ $categoria->id }}</td>
                  <td>{{ $categoria->name }}</td>
                  <td >{{ $categoria->description }}</td>
                  <td class="td-actions text-right">

                    <a href="{{ url('/admin/categories/'.$categoria->id.'/edit/') }}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                      <i class="fa fa-edit"></i>
                    </a>

                    <form action="{{ url('/admin/categories/'.$categoria->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" rel="tooltip" title="Eiminar" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
            {{ $categorias->links() }}
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
