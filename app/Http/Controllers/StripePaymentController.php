<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\TransactionPayment;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $payment_method = PaymentMethod::all();
        return view('stripe')->with(compact('payment_method'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $transaction_payments = new TransactionPayment(); 
        $transaction_payments->customer_name = $request->customer_name; 
        $transaction_payments->payment_id = $request->payment_id; 
        $transaction_payments->status = 'success'; 
        $transaction_payments->amount = $request->amount;
        $transaction_payments->save(); 
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from test.com." 
        ]);
         
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
