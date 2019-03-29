<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="utf-8">
 <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
 <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



 <title>Bienvenido</title>

 <!--     Fonts and icons     -->
 <!--     Fonts and icons     -->
 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

 <!-- CSS Files -->
 <link href="{{url('css/material-kit.min.css')}}" rel="stylesheet" />

</head>

<body class="profile-page sidebar-collapse" >

 <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
  <div class="container">
   <div class="navbar-translate">
    <a class="navbar-brand" href="{{url('/')}}">
    Mi tiendita </a>
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
    <a class="nav-link" href="{{ url('/home') }}">
     <i class="material-icons">home</i> Inicio
   </a>
 </li>
 @else
 <li class="nav-item">
  <a class="nav-link" href="{{ route('login') }}" onclick="scrollToDownload()">
   <i class="material-icons">person</i> Accesa
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
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="profile-content">
   <div class="container">
    <div class="row">
     <div class="col-md-2 ml-auto mr-auto">
      <div class="profile">
       <div class="avatar">
        <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
           @if(session('notification'))
               <div class="alert alert-success">
                   {{ session('notification')  }}
               </div>
           @endif
       </div>
      <div class="name">
        <h3 class="title">{{ $product->name}}</h3>
        <h6>{{ $product->category->name }}</h6>
        
      </div>
    </div>
  </div>
</div>
<div class="description text-center">
 <p>{{ $product->long_description }}</p>
</div>
<a href="{{ url('/') }}" class="btn btn-default">Regresar al listado</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Agregar al carrito</button>

<div class="tab-content tab-space">
 <div class="tab-pane active text-center gallery" id="studio">
  <div class="row">

   <div class="col-md-3 ml-auto">
    @foreach ($imagesLeft as $image)
    <img src="{{ $image->url }}" class="rounded" >
    @endforeach
  </div>

  <div class="col-md-3 mr-auto">
   @foreach ($imagesRight as $image) 
   <img src="{{ $image->url }}}" class="rounded" >
   @endforeach
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
@include('includes.footer')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

     <form method="POST"  action="{{ url('/cart') }}" >
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="modal-body">
          <input type="number" name="quantity" value="1" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Añadir al carrito</button>
      </div>
      </form>

    </div>
  </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>

<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
