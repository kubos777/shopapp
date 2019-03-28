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
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('admin/products') }}"> Gestionar productos </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
          
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
<div class="container">
  <div class="section text-center">
    <h2 class="title">Dashboard</h2>
    <div class="team">
      <div class="row container">
        <ul class="nav nav-pills nav-pills-icons nav-pills-info" role="tablist">
      <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      -->
      <li class="nav-item active ">
        <a class="nav-link active" href="#tasks-1" role="tab" data-toggle="tab">
          <i class="material-icons">shopping_cart</i>
          Carrito de compras
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
          <i class="material-icons">dashboard</i>
          Productos
        </a>
      </li>
    </ul>

  </div>

            <div class="row ">

            
            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">Nombre</th>
                  <th class="text-center ">Descripción</th>
                  <th class="text-center"> Imágen</th>
                  <th class="text-center ">Cantidad</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center" >Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach (auth()->user()->cart->details as $detail)

                <tr>
                  <td>{{ $detail->product->name }}</td>
                  <td>{{ $detail->product->description }}</td>
                  <td ><img src="{{$detail->product->featured_image_url}}"  width="50" height="50"></td>
                  <td class="text-center">{{ $detail->quantity }}</td>
                  <td class="text-center">&#36;{{ $detail->product->price }}</td>
                  <td class="text-center">&#36;{{ $detail->quantity * $detail->product->price }}</td>
                  <td class="td-actions text-right">
                    <form action="{{ url('/cart') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                      <button type="submit" rel="tooltip" title="Eiminar" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
            
          </div>
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
