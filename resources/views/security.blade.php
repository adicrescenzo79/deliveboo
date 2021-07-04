@extends('layouts.app')

@section('content')
  <div id="main_security">
    <div class="cointainer mt-5">
      <div class="row justify-content-center">
        <div class="col-md-12 flex justify-content-center align-items-center">
          <img src="{{ asset('img/poliziotto.jpg')}}" alt="">
          <div class="msg flex-center flex-column">
            <h1>ALT! Non puoi accedere a questo elemento!</h1>
            <a class="btn my-btn" href="{{route('welcome')}}">Torna alla HomePage</a>
          </div>

        </div>
      </div>
    </div>

  </div>
@endsection

@section('foot-script')
  {{-- <script src="{{asset('js/success.js')}}" charset="utf-8"></script> --}}
@endsection
