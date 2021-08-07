@extends('layouts.login')

@section('content')


       
            <div class="card">
                <div class="text-center intro">
                    <img src="https://i.imgur.com/uNiv4bD.png" width="160"> 
                    <span class="d-block account">Don't have account yet?</span>
                    <span class="contact">Contact us at <a href="" class="mail">contact@bbbootstrap.com</a> and <br> we will take care of everything</span>
                </div>
                <div class="mt-4 text-center">
                    <h4>Log In.</h4> <span>Login with your admin credentials</span>
                    
                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mt-3 inputbox">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="inputbox">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>

                        
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                        
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                    </form>
                </div>
            
   


@endsection