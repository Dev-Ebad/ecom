<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request){
        // dd($request->all());

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $request['user_id'] = Auth::id();
        $orders = Order::create($request->except('stripeToken'));
        
        $customer = Stripe\Customer::create(array(

        "address" => [

                "line1" => "Virani Chowk",

                "postal_code" => "360001",
                
                "city" => "Rajkot",

                "state" => "GJ",

                "country" => "IN",
                
            ],
            
        "email" => "demo@gmail.com",

        "name" => "Hardik Savani",
        
        "source" => $request->stripeToken
        
    ));



$strip_details = Stripe\Charge::create ([

        "amount" => 100 * 100,

        "currency" => "usd",

        "customer" => $customer->id,

        "description" => "Test payment from itsolutionstuff.com.",

        "shipping" => [

          "name" => "Jenny Rosen",

          "address" => [

            "line1" => "510 Townsend St",

            "postal_code" => "98140",

            "city" => "San Francisco",

            "state" => "CA",

            "country" => "US",

          ],

        ]

]);

// dd($strip_details);



Session::flash('success', 'Payment successful!');

       

return back();
    }

    public function success(){
        return view('user.cart');
    }
}
