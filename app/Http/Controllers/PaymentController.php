<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Session;
use Stripe;

class PaymentController extends Controller
{
    // public function checkout(Request $request, $down_payment){
    //     // dd($request->all());

    //     // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
    //     $payment =  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //             Stripe\Charge::create([
    //                 "amount" => 100 * $down_payment,
    //                 "currency" => "usd",
    //                 "source" => $request->stripeToken,
    //                 "description" => "Advance Payment Of Service"
    //             ]);

    //     dd($payment);

        // $request['user_id'] = Auth::id();
        // $orders = Order::create($request->except('stripeToken'));
        
    //     $customer = Stripe\Customer::create(array(

    //     "address" => [

    //             "line1" => "Virani Chowk",

    //             "postal_code" => "360001",
                
    //             "city" => "Rajkot",

    //             "state" => "GJ",

    //             "country" => "IN",
                
    //         ],
            
    //     "email" => "demo@gmail.com",

    //     "name" => "Hardik Savani",
        
    //     "source" => $request->stripeToken
        
    // ));



// $strip_details = Stripe\Charge::create ([

//         "amount" => 100 * 100,

//         "currency" => "usd",

//         "customer" => $customer->id,

//         "description" => "Test payment from itsolutionstuff.com.",

//         "shipping" => [

//           "name" => "Jenny Rosen",

//           "address" => [

//             "line1" => "510 Townsend St",

//             "postal_code" => "98140",

//             "city" => "San Francisco",

//             "state" => "CA",

//             "country" => "US",

//           ],

//         ]

// ]);

// dd($strip_details);



// Session::flash('success', 'Payment successful!');

       

// return back();
//     }

//     public function success(){
//         return view('user.cart');
//     }

public function stripe(Request $request)
{
    $products = Cart::where('user_id' , Auth::id())->where('status' , 'pending')->get();
    // dd((!$products->isEmpty()));
    if(!$products->isEmpty()){
        $all_products = [];
        foreach($products as $k => $value){
            $all_products[] =  $value->product_id;
        }
        $json_products = json_encode($all_products);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $bill = $request->bill;
        $products = $json_products;
        
        return view('user.stripe', compact('bill', 'name' , 'phone', 'address','products'));

    }else{
        return back()->with('success', 'no product is in your cart');
    }



}

/**
 * success response method.
 *
 * @return \Illuminate\Http\Response
 */
public function stripePost(Request $request)
{
    // dd($request->all());
    if(Auth::id()){
        Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'price' => $request->bill,
            'products' => $request->products,
            'status' => 'paid'
        ]);

        // $cart = Cart::where('user_id' , Auth::id())->get();
        // $cart->update(['status' => 'paid']);
        $products = json_decode($request->products);
        foreach($products as $k => $product){
            $cart = Cart::whereJsonContains('user_id' , Auth::id())->where('status' , 'pending')->first();
            // dd($cart);
            $cart['status'] = 'paid';
            $cart->save();
        }

    }
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $request->bill * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment successful in stripe" 
    ]);
  
    Session::flash('success', 'Payment successful!');
          
    return back()->with('success', 'Payment Successful');
}
}

