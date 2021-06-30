@extends('layouts.app')

@section('content')
  <div id="main-welcome">
    <section id="jumbo">
      <div class="overlay"></div>
      <div class="container-xl">
        <div class="row">
          <div class="square-nice-blue col-md-1 offset-md-1"></div>
          <div class="text-jumbo col-md-6 col-xl-5">
            <div class="content-jumbo ">
              <h1>I piatti che ami a domicilio.</h1>
              <p>
                Veloci e puntuali, consegna in al massimo 25min.
              </p>
            </div>

          </div>
        </div>
      </div>
    </section>

    {{-- slider --}}
    <section id="categories">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="content-category col-md-12 justify-content-center">
            <div class="icon-category all" @click="allRestaurants()">
              <div class="img-div">
                <img src="https://d4p17acsd5wyj.cloudfront.net/shortcuts/deals.png" alt="All Restaurants">
              </div>
              All
            </div>
            <div class="icon-category selected" v-for="category in categories" @click="restaurantByCategory(category.id)">
              <div class="img-div-icon">
<<<<<<< HEAD
                <img :src="category.icon" alt="@{{category.name}}">
=======
                <img :src="category.icon" :alt="category.name">
>>>>>>> dev
              </div>
              <span>
                @{{category.name}}
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Sezione dei ristoranti --}}
    <section id="restaurants">
      <div class="">
        <div class="row justify-content-center">
          <div class="content-restaurants  col-sm-6 col-md-6 col-lg-4" v-for="restaurant in restaurants">
            <div class="card">
              <a :href="'/restaurants/'+restaurant.slug" class="">
                <div class="content-card">
                  <div class="img-cover-image">
                    <img class="card-img-top" :src="restaurant.cover_image" alt="Card image cap">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      @{{restaurant.name}}
                    </h5>
                    <span class="card-text">
                      <i class="fas fa-map-marker-alt"></i>
                      @{{restaurant.address}}
                    </span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="container" v-if="more">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center">
              <button @click="allRestaurantsPlus" class="my-btn-create" type="button" name="button">Carica altri ristoranti</button>
            </div>
          </div>
        </div>
      </section>
    </div>{{-- chiusura Vue --}}

  @endsection

  @section('foot-script')
    <script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
  @endsection
