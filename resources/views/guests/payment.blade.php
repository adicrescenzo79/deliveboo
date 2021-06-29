{{-- <!doctype html> --}}
{{-- <html lang="{{ app()->getLocale() }}"> --}}
@extends('layouts.app')
{{-- <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Braintree-Demo</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head> --}}
@section('content')

<main id="main_payment">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
          <label for="customer_name">Intestatario della Carta</label>
          <input class="form-control" id="customer_name" type="text" name="customer_name"  v-model="orderForm.customer_name" placeholder="Nome e Cognome">
          <label for="customer_name">Totale transazione</label>
          <h6>€ @{{orderForm.total_paid}}</h6>
        </div>
        <div id="dropin-container"></div>
        <button  id="submit-button">Request payment method</button>
      </div>
    </div>
  </div>
  {{-- <script>
  var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    authorization: "{{ Braintree\ClientToken::generate() }}",
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (err, payload) {
        $.get('{{ route('payment.make') }}', {payload}, function (response) {
          if (response.success) {
            alert('Payment successfull!');
          } else {
            alert('Payment failed');
          }
        }, 'json');
      });
    });
  });
  </script> --}}

</main>
<script type="text/javascript">
  $( document ).ready(function() {
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{ Braintree\ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          $.get('{{ route('payment.make',['amount' => $restaurant->id]) }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });

  });

</script>
@endsection

@section('foot-script')
  <script src="{{asset('js/payment.js')}}" charset="utf-8"></script>
@endsection

{{-- </html> --}}
