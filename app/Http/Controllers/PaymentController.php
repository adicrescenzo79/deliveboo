<?php

use Braintree\Transaction;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function make(Request $request)
  {
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
    $status = Braintree_Transaction::sale([
      'amount' => '10.00',
      'paymentMethodNonce' => $nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);
    return response()->json($status);
  }
}
