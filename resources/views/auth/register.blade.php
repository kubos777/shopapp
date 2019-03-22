@extends('layouts.app')

@section('titulo','Regístrate')

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-6 ml-auto mr-auto">
    <div class="card card-login">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card-header card-header-primary text-center">
          <h4 class="card-title">Regístrate</h4>
        </div>
        <p class="description text-center">Ingresa tus datos</p>
        <div class="card-body">

         <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="material-icons">person</i>
            </span>
          </div>
          <input id="name" type="text" class="form-control" placeholder="Nombre completo" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>


        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="material-icons">mail</i>
            </span>
          </div>
          <input id="email" type="email" class="form-control" placeholder="Correo electrónico" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="material-icons">lock_outline</i>
            </span>
          </div>
          <input type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="material-icons">lock_outline</i>
            </span>
          </div>
          <input type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required>
        </div>


      </div>
      <div class="footer text-center">
        <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Regístrarme</button>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
