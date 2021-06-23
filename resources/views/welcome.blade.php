@extends('layouts.app')

@section('content')
<div id="main-welcome">
  <section id="jumbo">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="content-jumbo">
            <img src="" alt="">
            <h1>Immagine per il jumbo</h1>
            {{-- <input type="text" name="" value=""> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Sezione delle categorie --}}
  <section id="categories">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="content-categories">
            <ul>
              <li v-for="category in categories">@{{category.name}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Sezione dei ristoranti --}}
  <section id="restaurants">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="content-restaurants">
            <ul>
              <li v-for="restaurant in restaurants">@{{restaurant.name}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

@section('foot-script')
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> --}}
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
