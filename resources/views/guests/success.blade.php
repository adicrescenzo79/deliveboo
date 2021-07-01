@extends('layouts.app')

@section('content')
  <div id="main_success">
    <img src="{{ asset('img/consegna.jpg')}}" alt="">
    <div class="msg flex-center flex-column">
      <h1>Stiamo arrivandooo!</h1>
      <a class="btn btn-primary" href="{{route('welcome')}}">Torna alla HomePage</a>
    </div>

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/success.js')}}" charset="utf-8"></script>
@endsection
