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
              <li>Categorie</li>
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
              <li>Restaurants</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
