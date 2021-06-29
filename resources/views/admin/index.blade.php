{{-- vista non utilizzata --}}
@extends('layouts.app')

@section('content')
<div id="home">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('You are logged in!') }}
            <a href="{{route('admin.restaurants.index')}}">I tuoi ristoranti</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
