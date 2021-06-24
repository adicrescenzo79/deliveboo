@extends('layouts.app')

@section('content')
  <div id="main-welcome">
    ciao
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
    {{-- slider --}}
    <div class="container">
      <div class="responsive">
        <div @click="allRestaurants()" class="">
          All
        </div>
        <div v-for="category in categories" @click="restaurantByCategory(category.id)">
          <img :src="category.icon" alt="@{{category.name}}">
          <span>@{{category.name}}</span>
        </div>
      </div>
    </div>
    {{-- Sezione dei ristoranti --}}
    <section id="restaurants">
      <div class="container">
        <div class="row justify-content-center">
          <div v-for="restaurant in restaurants" class="col-md-3">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" :src="restaurant.logo" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">@{{restaurant.name}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Sezione dei piatti --}}
  <section id="dishes">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="content-dishes">
            <ul>
              <li v-for="dish in dishes">@{{dish.name}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>{{-- chiusura Vue --}}

@endsection

@section('foot-script')
  <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
