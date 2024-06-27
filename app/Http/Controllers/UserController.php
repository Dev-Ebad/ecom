<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function mens(){
        $products = Product::all();
        return view('user.men')->with(compact('products'));
    }

    public function womens(){
        $products = Product::orderBy('created_at' , 'desc')->where('attributes' , 'women')->get();
        return view('user.women')->with(compact('products'));
    }

    public function product_detail(){
        return view('user.product-detail');
    }

    public function single_product($id){
        $product_single = Product::find($id);
        $product_images = DB::table('products_table')->select('images')->where('id' , $id)->get();
        // dd($product_images[0]->images);
        return view('user.product-detail')->with(compact('product_single','product_images'));
        
    }


    // add to cart 
    public function addToCart(Request $request){
        $product_cart = Product::find($request->id);
        $cart_data = Cart::where('user_id' , Auth::id())->where('product_id',$request->id)->get();
        
        if(!empty($cart_data[0])){
            return response()->json(['error' => 'Product already exist in cart']);
        }else{
            Cart::create([
                'product_name' => $product_cart->name,
                'product_id' => $product_cart->id,
                'user_id' => Auth::id(),
                'price' => $product_cart->price
            ]);
            return response()->json(['success' => 'Product is added to the cart']);
        }
    }

    public function cart(){
        $cart_data = Cart::where('user_id' , Auth::id())->get();
        // dd($cart_data);
        return view('user.cart')->with(compact('cart_data'));
    }






}
