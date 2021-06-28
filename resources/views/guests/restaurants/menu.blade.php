@extends('layouts.app')

@section('content')
  <div id="main_menu">
    {{-- Sezione dei piatti --}}
    <section id="dishes">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="content-dishes">
              <ul v-for="dish in dishes">
                <li><img :src="dish.image" alt=""></li>
                <li>@{{dish.name}}</li>
                <li>@{{dish.price}}</li>
                <span><i @click="addCart(dish)" class="fas fa-plus"></i></span>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="cart">
      <div class="container">
        <div class="row">
          <div class="content-cart">
            <ul>
              <li v-for="dish in cart" v-if="dish.restaurantSlug == slug">
                <span><i class="fas fa-minus" @click="minusCart(dish)"></i></span>
                @{{dish.name}}
                <span>@{{dish.quantity}}</span>
                <span>@{{dish.price}}</span>

                <span><i class="fas fa-plus" @click="addCart(dish)"></i></span>
              </li>
            </ul>
          </div>
        </div>
        <a class="btn btn-primary" @click="completeOrder" href="{{route('checkout')}}" v-if="completeButton" type="button" name="button">Completa ordine</a>
      </div>
    </section>

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
@endsection
