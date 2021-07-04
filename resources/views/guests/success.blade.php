@extends('layouts.app')

@section('content')
  <div id="main_success" class="py-5">
    <div class="cointaine">
      <div class="row justify-content-center">
        <div class="col-md-8 flex justify-content-around align-items-center img-msg p-3">
          <i class="fas fa-receipt"></i>
          <div class="msg flex-center flex-column">
            <h1>Ordine confermato.</h1>
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
