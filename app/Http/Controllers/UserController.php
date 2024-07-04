<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at' , 'desc')->paginate(8);
        return view('user.index')->with(compact('products'));
    }

    public function mens(){
        $products = Product::orderBy('created_at' , 'desc')->where('attributes' , 'women')->paginate(5);
        return view('user.men')->with(compact('products'));
    }

    public function womens(){
        $products = Product::orderBy('created_at' , 'desc')->where('attributes' , 'women')->paginate(5);
        // dd($products);
        return view('user.women')->with(compact('products'));
    }

    public function product_detail(){
        return view('user.product-detail');
    }

    public function checkout_page($total){
        return view('user.checkout')->with(compact('total'));
    }

    public function about(){
        return view('user.about');
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
            // dd($request->all());
            return response()->json(['error' => 'Product already exist in cart']);
        }else{
            Cart::create([
                'product_name' => $product_cart->name,
                'product_id' => $product_cart->id,
                'user_id' => Auth::id(),
                'price' => $product_cart->price,
                'quantity' => $request->quantity,
                'status' => 'pending'
            ]);
            return response()->json(['success' => 'Product is added to the cart']);
        }
    }

    public function cart(){
        $cart_data = Cart::where('user_id' , Auth::id())->where('status' , 'pending')->get();
        // dd($cart_data);
        return view('user.cart')->with(compact('cart_data'));
    }

    public function change_quantity(Request $request){
        $update_quantity = DB::table('cart')->where('product_id', $request->product_id)->update(array('quantity' => $request->quantity));
        if($update_quantity){            
            $cart_data = Cart::where('product_id' , $request->product_id)->get();
            $cart = Cart::where('user_id' , Auth::id())->get();
            return response()->json(['success' , 'quantity updated' , 'cart_data' => $cart_data, 'cart' => $cart]);
        }else{
            return response()->json(['error' => 'error in updating the quantity']);
        }
    }

    public function remove_cart(Request $request){
        $delete_data = DB::table('cart')->where('product_id', $request->product_id)->where('user_id' , Auth::id())->delete();
        if($delete_data){
            return response()->json(['success' => 'item removed from the cart']);
        }else{
            return response()->json(['error' => 'item not found']);
        }
    }


    public function count_cart(){
        $cart_count = Cart::where('user_id' , Auth::id())->count();
        return response()->json(['cart_count' => $cart_count]);
    }

    public function filter_brand(Request $request){

        if($request->brand){
            $products = Product::where('brand' , $request->brand)->where('attributes', $request->category)->where('status' , 'active')->get();
        }else if($request->size){
            $products = Product::whereJsonContains('size' , (string)$request->size)->where('attributes', 'women')->where('status' , 'active')->get();
        }
        $view = view('includes.filter_products', compact('products'))->render();
        return ['view' => $view];
    }


    public function search_filter(Request $request){

        $products = Product::orderBy('name' , 'asc')->where('attributes' , $request->inputs)->get();
        $view = view('includes.filter_products',compact('products'))->render();
        return ['view' => $view];
    }


    public function user_profile(){
        $user_data = User::where('id', Auth::id())->first();
        $orders = Order::with('user')->where('user_id', Auth::id())->get();
        
        return view('user.user_profile')->with(compact('user_data', 'orders'));
    }

}
