@extends('layouts.app')

@section('content')
  <div id="main_checkout">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="" action="{{route('payment')}}" method="get">

            <div class="form-group">
              <label for="customer_name">Nome e Cognome</label>
              <input class="form-control" id="customer_name" type="text" name="customer_name" v-model="orderForm.customer_name" placeholder="Nome e Cognome">
            </div>

            <div class="form-group">
              <label for="customer_email">La tua eMail</label>
              <input class="form-control" id="customer_email" type="email" name="customer_email" v-model="orderForm.customer_email" placeholder="La tua eMail">
            </div>

            <div class="form-group">
              <label for="customer_telephone">Il tuo telefono</label>
              <input class="form-control" id="customer_telephone" type="tel" name="customer_telephone" v-model="orderForm.customer_telephone" placeholder="Il tuo telefono">
            </div>

            <div class="form-group">
              <label for="delivery_address">Indirizzo di consegna</label>
              <input class="form-control" id="delivery_address" type="text" name="delivery_address" v-model="orderForm.delivery_address" placeholder="Indirizzo di consegna">
            </div>

            <div class="form-group">
              <label for="delivery_time">Orario di consegna</label>
              <input class="form-control" id="delivery_time" type="time" name="delivery_time" v-model="orderForm.delivery_time" placeholder="Orario di consegna">
            </div>

            <div class="form-group">
              <label for="delivery_notes">Orario di consegna</label>
              <textarea rows="8" cols="80" class="form-control" id="delivery_notes" type="text" name="delivery_notes" v-model="orderForm.delivery_notes" placeholder="Orario di consegna">
              </textarea>
              
            {{-- RENDERE ATTIVO SOLAMENTE SE TUTTI I CAMPI OBBLIGATORI SONO COMPILATI --}}
              <input class="btn btn-dark"  type="submit" @click="payForm" name="button" value="Paga">
            </div>

          </form>
        </div>
      </div>
      <div class="cart">
        <ul>
          <li v-for="dish in cart">
            <span><i class="fas fa-minus" @click="minusCart(dish)"></i></span>
            <span>@{{dish.name}}</span>
            <span>@{{dish.quantity}}</span>
            <span>@{{dish.price}}</span>
            <span><i class="fas fa-plus" @click="addCart(dish)"></i></span>
          </li>
        </ul>
      </div>
      <a :href="'/restaurants/'+slug">+ aggiungi articoli</a>
    </div>
  </div>


@endsection

@section('foot-script')
  <script src="{{asset('js/checkout.js')}}" charset="utf-8"></script>
@endsection
