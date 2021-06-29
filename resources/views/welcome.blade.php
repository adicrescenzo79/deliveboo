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

    {{-- slider --}}
    <section id="categories">
      <div class="container">
        <div class="row justify-content-center">
          <div class="content-category col-md-12">
            <div class="icon-category" @click="allRestaurants()">
              <img src="" alt="Tutti i ristoranti">
              <span>All</span>
            </div>
            <div class="icon-category selected" v-for="category in categories" @click="restaurantByCategory(category.id)">
              <img :src="category.icon" alt="@{{category.name}}">
              <span>@{{category.name}}</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Sezione dei ristoranti --}}
    <section id="restaurants">
      <div class="container">
        <div class="row justify-content-center">
          <div class="content-restaurants col-md-3" v-for="restaurant in restaurants">
            <div class="card" style="width:18rem">
              <a :href="'/restaurants/'+restaurant.slug" class="">
                <div class="content-card">
                  <img class="card-img-top" :src="restaurant.logo" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">@{{restaurant.name}}</h5>
                    <span class="card-text">@{{restaurant.telephone}}</span>
                    <span class="card-text">@{{restaurant.address}}</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="container" v-if="more">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <button @click="allRestaurantsPlus" class="btn btn-primary" type="button" name="button">Carica altri ristoranti</button>
          </div>
        </div>
      </div>
    </section>
  </div>{{-- chiusura Vue --}}

@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
