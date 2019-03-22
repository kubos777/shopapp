@extends('layouts.app')

@section('titulo','Inicia sesión')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicia sesión</h4>
            </div>
            <p class="description text-center">Ingresa tus datos</p>
            <div class="card-body">
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

  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="" checked>Recordar mis datos
      <span class="form-check-sign">
        <span class="check"></span>
      </span>
    </label>
  </div>
   


</div>
<div class="footer text-center">
    <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</button>
         @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('¿Olvidaste tu contraseña?') }}
        </a>
    @endif
</div>
</form>
</div>
</div>
</div>

@endsection
