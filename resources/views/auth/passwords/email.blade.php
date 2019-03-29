@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <div class="card card-login">

        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Recuperar contraseña</h4>
            </div>
            <p class="description text-center">Ingresa tus datos</p>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                
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
        

    </div>
    <div class="footer text-center">
        <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Enviar correo de recuperación</button>

    </div>
</form>
</div>
</div>
</div>

@endsection
