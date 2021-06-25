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

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
@endsection
