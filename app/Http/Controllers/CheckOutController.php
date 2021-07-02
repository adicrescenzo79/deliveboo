<?php

namespace App\Http\Controllers;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

class CheckoutController extends Controller
{

  public function pay(Request $request){

    //validazione campi

    $validator = Validator::make($request->json()->all(),[
      'customer_name' => 'required|string|max:255',
      'customer_email' => 'required|string|max:255',
      'delivery_address' => 'required|string|max:255',
      'customer_telephone' => 'required|numeric',
      'delivery_time' => 'required|date_format:H:i',
      'total_paid' => 'required|numeric',
      'creditCard' => 'required'
    ]);
    if ($validator->fails()){
      return response()->json([
        'success' => false,
        'validation' => $validator->errors()
      ]);
    }
    $data = $request->json()->all();

    //credenziali per la Sandbox di braintree
    $gateway = new Braintree\Gateway([
      'environment' => 'sandbox',
      'merchantId' => 'b34nxjs25s4s9rtv',
      'publicKey' => 'tgds3t6gx2prn283',
      'privateKey' => '46ad8024bc8677b7be78884e2e8247dc'
    ]);

    //generazione Token
    $clientToken = $gateway->clientToken()->generate();

    //Metodo di simulazione pagamento (carta di credito valida fake)
    $nonceFromTheClient = 'fake-valid-nonce';

    //Creazione nuovo cliente (verrà visualizzato in sandbox
    $cliente = $gateway->customer()->create([
      'firstName' => $data['customer_name'],
      'lastName' => $data['customer_name'],
      'email' => $data['customer_email'],
      'phone' => $data['customer_telephone'],
      'paymentMethodNonce' => $nonceFromTheClient
    ]);


    // prova
    //         foreach($cliente->errors->deepAll() AS $error) {
    //     print_r($error->attribute . ": " . $error->code . " " . $error->message . "\n");
    // }
    //
    // foreach($cliente->errors->forKey('customer')->shallowAll() AS $error) {
    //     print_r($error->attribute . ": " . $error->code . " " . $error->message . "\n");
    // }
    //
    // foreach($cliente->errors->forKey('customer')->forKey('creditCard')->shallowAll() AS $error) {
    //     print_r($error->attribute . ": " . $error->code . " " . $error->message . "\n");
    // }

    // fine prova
    //creazione nuova transazione di vendita
    $result = $gateway->transaction()->sale([
      'amount' => $data['total_paid'],
      'customerId' => $cliente->customer->id,
      'creditCard' => [
        'number' => $data['creditCard']['card_number'],
        'cardholderName' => $data['creditCard']['card_name'],
        'expirationDate' => $data['creditCard']['expirationDate'],
        'cvv' => $data['creditCard']['cvv']
      ],
      'options' => [
        'submitForSettlement' => True
      ]
    ]);
    // return response()->json([$result]);



    if ($result->success) {

      //Invio Mail al pagamento
      Mail::to('mail@mail.it')->send(new SendNewMail());


      return response()->json([
        'success' => true,
      ]);
    }

    return response()->json([
      'success' => false,
      'errors' => $result->message
    ]);


  }
}
