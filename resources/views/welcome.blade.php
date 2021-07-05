@extends('layouts.app')

@section('content')
<div id="main-welcome">
    <section id="jumbo">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="middle-jumbo col-12 col-sm-8 col-md-8 col-lg-8 ">
                    {{-- <div class="square-nice-blue"></div> --}}
                    <div class="text-jumbo">
                        <div class="content-jumbo ">
                            <h1>I piatti che ami a domicilio.</h1>
                            <p>
                                Veloci e puntuali, consegna <br>al massimo in 25 minuti.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- slider --}}
    <section id="categories">
        <div class="container">
            <div class="row">
                <div class="content-category col-md-12">
                    <div class="icon-category all" @click="allRestaurants()" :class="(categorySelected.length == 0) ? 'selected' : '' ">
                        <div class="img-div-icon">
                            <img src="https://d4p17acsd5wyj.cloudfront.net/shortcuts/deals.png" alt="All Restaurants">
                        </div>
                      <span>Tutti</span>
                    </div>
                    <div class="icon-category" v-for="category in categories"  @click="restaurantByCategory(category.id)" :class="(categorySelected.includes(category.id)) ? 'selected' : '' ">
                        <div class="img-div-icon">
                            <img :src="category.icon" :alt="category.name">
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
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 catecory-selected">
                <h3 class="pt-3" v-if="(categorySelected.length)">Le categorie selezionate</h3>
                <ul>
                  <li v-for="category in categories" v-if="(categorySelected.includes(category.id))" @click="restaurantByCategory(category.id)">@{{category.name}}</li>
                </ul>
              </div>
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
                <div class="col-md-8 text-center pb-5">
                    <button @click="allRestaurantsPlus" class="my-btn-create my-5" type="button" name="button">Carica altri ristoranti</button>
                </div>
            </div>
        </div>
    </section>
</div>{{-- chiusura Vue --}}

@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
