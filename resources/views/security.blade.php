@extends('layouts.app')

@section('content')
<div id="main-welcome">
  {{-- Sezione dei ristoranti --}}
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1>NON PUOI MODIFICARE QUESTO ELEMENTO</h1>
        <a href="{{route('admin.restaurants.index')}}">Torna ai tuoi ristoranti</a>
      </div>
    </div>
  </div>
</div>{{-- chiusura Vue --}}

@endsection

@section('foot-script')
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
