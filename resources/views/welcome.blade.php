@extends('layouts.app')

@section('content')
<div id="main-welcome">
    <section id="jumbo">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="middle-jumbo col-12 col-sm-8 offset-sm-4
                              col-md-6 offset-md-6 col-lg-6 offset-lg-6">
                    <div class="square-nice-blue"></div>
                    <div class="text-jumbo">
                        <div class="content-jumbo ">
                            <h1>I piatti che ami a domicilio.</h1>
                            <p>
                                Veloci e puntuali, consegna in al massimo 25min.
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
                    <div class="icon-category all" @click="allRestaurants()">
                        <div class="img-div">
                            <img src="https://d4p17acsd5wyj.cloudfront.net/shortcuts/deals.png" alt="All Restaurants">
                        </div>
                        All
                    </div>
                    <div class="icon-category selected" v-for="category in categories" @click="restaurantByCategory(category.id)">
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
    <button @click="prova()" type="button" name="button">prova</button>
</div>{{-- chiusura Vue --}}

@endsection

@section('foot-script')
<script src="{{asset('js/welcome.js')}}" charset="utf-8"></script>
@endsection
