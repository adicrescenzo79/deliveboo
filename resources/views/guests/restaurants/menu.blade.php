@extends('layouts.app')

@section('content')
  <div id="main_menu" class="pb-5">
    <div class="jumbo flex flex-row justify-content-center align-items-center" :style="background">
      <img class="logo" :src="restaurant.logo" alt="logo">
      <h1>@{{restaurant.name}}</h1>
    </div>
    {{-- Sezione dei piatti --}}
    <section id="dishes" class="pt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 order-md-2 mb-4 mt-3 flex-row flex-center">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="">Cosa vorresti mangiare?</span>
            </h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 menu-dish mt-1" v-for="dish in dishes" v-if="dish.visibility">
            <div @click="addCart(dish)" class="card flex-column justify-content-between align-items-center">
              <img :src="dish.image" alt="">
                <span class="text-capitalize d-block"><strong>@{{dish.name}}</strong></span>
                <span class="text-capitalize d-block">@{{dish.description}}</span>
              <span class="text-capitalize"><strong>€ @{{dish.price.toFixed(2)}}</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="cart">
      <div class="container">
        <div class="row justify-content-center">

          {{-- nuovo cart --}}
          <div class="col-md-6 order-md-2 mb-4 mt-5">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Il tuo carrello</span>
              <span class="badge badge-secondary badge-pill">@{{totDishes()}}</span>
            </h4>
            <ul class="list-group mb-3">
              <li v-for="dish in cart"  v-if="dish.restaurantSlug == slug" class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <span><i class="fas fa-minus" @click="minusCart(dish)"></i></span>
                  <input type="number" name="" value="" v-model.number="dish.quantity">
                  <h6 class="my-0">@{{dish.name}}</h6>
                </div>
                <span class="text-muted">€ @{{dish.price.toFixed(2)}}</span>
                <span><i class="fas fa-plus" @click="addCart(dish)"></i></span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Totale (EUR)</span>
                <strong>€ @{{total().toFixed(2)}}</strong>
              </li>
            </ul>
          </div>

          {{-- fine nuovo cart --}}

        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 order-md-2 mb-4 mt-3">

            <a class="btn btn-dark btn-md btn-block" @click="completeOrder" href="{{route('checkout')}}" v-if="completeButton" type="button" name="button">Completa ordine</a>
          </div>

        </div>
      </div>
    </section>

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
@endsection
