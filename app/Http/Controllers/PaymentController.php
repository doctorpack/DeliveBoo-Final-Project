<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
{
    try {
        // Imposta la chiave segreta di Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Crea l'intento di pagamento
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount,
            'currency' => 'eur',
        ]);

        // Restituisce l'intento di pagamento
        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    } catch (\Exception $e) {
        // Restituisce un messaggio di errore con una risposta JSON
        return response()->json(['error' => $e->getMessage()]);
    }
}
}
