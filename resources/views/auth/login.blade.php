@extends('layouts.login')

@section('title', 'Login')

@section('content')

<div class="col-lg-6 d-none d-lg-block ">
  <img style="height: 380px;" class="card-img-top mx-auto d-block" src="{!! asset('img/logo_perfect.png') !!}" alt="Card image cap">
</div>   
<div class="col-lg-6">
  <div class="p-5">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Inspeccion Perfect Body</h1>
    </div>
    @include('estados/mensaje') 
    <form class="user" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
      @csrf
      <div  class="form-group">
        <input type="login" class="form-control form-control-user @error('login') is-invalid @enderror" id="login"   name="login" value="{{ old('login') }}"  autofocus placeholder=" Nombre de usuario o Correo electronico">
        
        @error('login')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <br>
      <div class="form-group">
        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Contraseña">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox small">
          <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="customCheck">
          <label class="custom-control-label" for="customCheck">Recuerdame</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-user btn-block"> Iniciar sesion</button>
      <br>  
      <div class="text-center">
        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Se te olvido la contraseña?') }}
          </a>
      @endif    
    </form>    
    </div>
  </div>
</div>
    
@endsection

