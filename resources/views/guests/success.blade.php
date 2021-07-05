@extends('layouts.app')

@section('content')
  <div id="main_success">
    <div class="cointaine">
      <div class="row justify-content-center">
        <div class="col-md-6 d-flex flex-column justify-content-around align-items-center img-msg py-5">
          <i class="fas fa-receipt"></i>
          <div class="msg flex-center flex-column">
            <h1>Il tuo ordine è stato confermato</h1>
            <h5>Sarai reindirizzato alla Homepage tra <strong>@{{countdown}}</strong> secondi</h5>
            <a class="btn my-btn" href="{{route('welcome')}}">Torna alla HomePage</a>
          </div>
        </div>
      </div>
    </div>


  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/success.js')}}" charset="utf-8"></script>
@endsection
