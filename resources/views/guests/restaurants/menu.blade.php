@extends('layouts.app')

@section('content')
  <div id="main_menu" class="pb-5">
    <div class="jumbo" :style="background"></div>
    <div class="container-restaurant">
      <div class="row justify-content-center">
        <div class="col-md-8">


          <div class="card text-center">
            <div class="card-body">
              <div class="img-overflow">
                <img class="" :src="restaurant.logo" alt="logo">

              </div>

              <h1 class="card-title my-3">@{{restaurant.name}}</h1>
              <p class="card-text text-secondary">@{{restaurant.category}}</p>

              <p class="card-text">@{{restaurant.address}}</p>
              <p class="card-text">Tel: @{{restaurant.telephone}}</p>

            </div>
          </div>
        </div>
      </div>
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
          <div class="col-md-12 col-lg-6 menu-dish mt-1" v-for="dish in dishes" v-if="dish.visibility">
            <div @click="addCart(dish)" class="card flex flex-row justify-content-between align-items-center">
              <div class="text py-1 flex flex-column justify-content-between align-items-flex-start">
                <span class="text-capitalize"><strong>@{{dish.name}}</strong></span>
                <span class="text-capitalize desc">@{{dish.description}}</span>
                <span class="text-capitalize"><strong>€ @{{dish.price.toFixed(2)}}</strong></span>
              </div>
              <img :src="dish.image" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="cart">
      <div class="container">
        <div class="row justify-content-center">

          {{-- nuovo cart --}}
          <div class="col-md-8 order-md-2 mb-4 mt-5">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Il tuo carrello</span>
              <span class="badge badge-secondary badge-pill my-badge">@{{totDishes()}}</span>
            </h4>
            <ul class="list-group mb-3">
              <li v-for="dish in cart"  v-if="dish.restaurantSlug == slug" class="list-group-item d-flex justify-content-between lh-condensed">
                <div class="left">
                  <span><i class="fas fa-minus" @click="minusCart(dish)"></i></span>
                  <input type="number" name="" value="" v-model.number="dish.quantity" class="mx-2">
                  <span><i class="fas fa-plus" @click="addCart(dish)"></i></span>
                </div>
                <span class="my-0">@{{dish.name}}</span>
                <div class="right">
                  <span class="text-muted text-right">€ @{{dish.price.toFixed(2)}}</span>
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between my-total-cart">
                <span>Totale (EUR)</span>
                <strong>€ @{{total().toFixed(2)}}</strong>
              </li>
            </ul>
          </div>

          {{-- fine nuovo cart --}}

        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 order-md-2 mb-4 mt-3 btn-order">
            <a class="btn btn-dark btn-md btn-block my-btn" @click="completeOrder" href="{{route('checkout')}}" v-if="completeButton" type="button" name="button">Completa ordine</a>
          </div>

        </div>
      </div>
    </section>

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
@endsection
