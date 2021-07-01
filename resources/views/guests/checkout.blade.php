@extends('layouts.app')

@section('content')

  <div id="main_checkout">
    <div class="container">
      <div class="row">
        {{-- CART --}}
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">@{{totDishes()}}</span>
          </h4>
          <ul class="list-group mb-3">
            <li v-for="dish in cart" class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <span><i class="fas fa-minus" @click="minusCart(dish)"></i></span>
                <h6 class="my-0">@{{dish.quantity}} @{{dish.name}}</h6>
              </div>
              <span class="text-muted">€ @{{dish.price.toFixed(2)}}</span>
              <span><i class="fas fa-plus" @click="addCart(dish)"></i></span>
            </li>
            <li class="list-group-item d-flex justify-content-between"><a :href="'/restaurants/'+slug">+ aggiungi articoli</a></li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (EUR)</span>
              <strong>€ @{{total()}}</strong>
            </li>
          </ul>
        </div>

        {{-- TRANSAZIONE --}}
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dati per la transazione</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="customer_name">Nome e Cognome</label>
                <input :class="(validationcustomer_name) ? 'is-invalid' : ''" class="form-control"  id="customer_name" type="text" name="customer_name" v-model="orderForm.customer_name"  placeholder="Nome e Cognome">
                <small v-if="validationcustomer_name" class="text-danger modal-validation">@{{validationcustomer_name}}</small>

              </div>
            </div>

            <div class="mb-3">
              <label for="customer_email">La tua eMail</label>
              <input :class="(validationcustomer_email) ? 'is-invalid' : ''" class="form-control" id="customer_email" type="email" name="customer_email" v-model="orderForm.customer_email" placeholder="La tua eMail">
              <small v-if="validationcustomer_email" class="text-danger modal-validation">@{{validationcustomer_email}}</small>
            </div>

            <div class="mb-3">
              <label for="delivery_address">Indirizzo di consegna</label>
              <input :class="(validationdelivery_address) ? 'is-invalid' : ''" class="form-control" id="delivery_address" type="text" name="delivery_address" v-model="orderForm.delivery_address" placeholder="Indirizzo di consegna">
              <small v-if="validationdelivery_address" class="text-danger modal-validation">@{{validationdelivery_address}}</small>
            </div>

            <div class="mb-3">
              <label for="customer_telephone">Il tuo telefono</label>
              <input :class="(validationcustomer_telephone) ? 'is-invalid' : ''" class="form-control" id="customer_telephone" type="tel" name="customer_telephone" v-model="orderForm.customer_telephone" placeholder="Il tuo telefono">
              <small v-if="validationcustomer_telephone" class="text-danger modal-validation">@{{validationcustomer_telephone}}</small>
            </div>

            <div class="mb-3">
              <label for="delivery_time">Orario di consegna</label>
              <input :class="(validationdelivery_time) ? 'is-invalid' : ''" class="form-control" id="delivery_time" type="time" name="delivery_time" v-model="orderForm.delivery_time" placeholder="Orario di consegna">
              <small v-if="validationdelivery_time" class="text-danger modal-validation">@{{validationdelivery_time}}</small>
            </div>

            <div class="mb-3">
              <label for="delivery_notes">Note per la consegna</label>
              <textarea rows="8" cols="80" class="form-control" id="delivery_notes" type="text" name="delivery_notes" v-model="orderForm.delivery_notes" placeholder="Orario di consegna">
              </textarea>
              <div class="invalid-feedback">
                Please enter some notes.
              </div>
            </div>



            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" v-model="orderForm.credit_card.card_number" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" v-model="orderForm.credit_card.expirationDate" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" v-model="orderForm.credit_card.cvv" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <a class="btn btn-dark btn-md btn-block" @click="pay">Continue to checkout</a>
          </form>
        </div>
      </div>
    </div>


  @endsection

  @section('foot-script')
    <script src="{{asset('js/checkout.js')}}" charset="utf-8"></script>
  @endsection
