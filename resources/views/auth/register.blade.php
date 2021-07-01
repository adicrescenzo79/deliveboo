@extends('layouts.app')

@section('content')
  <div id="main-log-reg" class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">{{ __('Registrazione') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-group row">
                {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                <div class="col-md-12">
                  <input id="name" placeholder="Nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                  <div class="col-md-12">
                    <input id="email" placeholder="Indirizzo email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                    <div class="col-md-12">
                      <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                      <div class="col-md-12">
                        <input id="password-confirm" placeholder="Conferma password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>

                    <div class="form-group row mb-0">
                      <div class="col-md-12">
                        <button type="submit" class="my-btn-main">
                          {{ __('Registrati') }}
                        </button>
                        <div class="col-md-12 text-center mt-2">
                          <p class="mt-3">Hai già un account? <a class="my-link" href="{{ route('login') }}">Accedi al tuo account</a> </p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection
