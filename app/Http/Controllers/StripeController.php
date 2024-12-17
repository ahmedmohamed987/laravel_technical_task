<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Product;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('stripe');   
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required',
        ]);
        
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'description' => 'Test Payment',
            ]);
            
            return redirect()->route('home')->with('success_message', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('Error: ' . $e->getMessage());
        }
    }
}
