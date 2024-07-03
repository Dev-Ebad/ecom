<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function users(){

        $registered_users = User::where('role', '!=' , 'admin')->get();

        return view('admin.users')->with(compact('registered_users'));
    }
    public function table(){
        return view('admin.tables');
    }

    public function create_user(Request $request){
        // dd($request->all());

        $user_data = $request->except('profile');
        $imageName = '';
        if($request->hasFile('profile')){
            $image = $request->file('profile');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('storage/app/uplods', $imageName);
        }
        $rand_pass = Str::random(5);
        $user_data['password'] = Hash::make($rand_pass);
        $user_data['profile'] = $imageName;
        $user_data['role'] = 'user';
        $suc = User::create($user_data);

        if($suc) {
            $email = new Mailer;
            $data = [
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'pass' => $rand_pass,
                'role' => $user_data['role'],
            ];
            $view = view('includes.email', compact('data'))->render();
            $email->email($request->email,'Account Creation at Website',$view);
        }

        if($suc){
            return back()->with('success','User Created Successfully');

        }else{
            return back()->with('error', 'Unable to create the user');
        }


    }

    public function edit_user(Request $request){
        $user_data = User::find($request->user_id);
        // print_r($user_data); die;
        return response()->json($user_data);
    }


    // edit user

    public function update_user(Request $request){
        // dd($request->all());
        $edit_user = User::find($request->user_id);
        $user_data = $request->except('profile');
        $imageName = '';
        if($request->hasFile('profile')){
            $image = $request->file('profile');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName);
        }

        $user_data['profile'] = $imageName;
        $edit_user->update($user_data);
        return back()->with('success' , 'User Updated Successfully');
    }

    public function delete_user(Request $request){
        $user_data = User::find($request->user_id);
        if(!empty($user_data)){
            $user_data->delete();
            return back()->with('success' , 'User delete successfully');
        }else{
            return back()->with('error' , 'User not found');
        }
    }


    // fetch product
    public function products(){
        $products = Product::paginate(15);
        return view('admin.products')->with(compact('products'));
    }

    // add product
    public function create_product(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'discount_price' => 'required',
        //     'stock_quantity' => 'required',
        //     'weight' => 'required',
        //     'attributes' => 'required',
        //     'status' => 'required',
        //     'featured' => 'required',
        //     'rating' => 'required',
        //     'reviews' => 'required',
        //     'tags' => 'required',
        // ]);
        $allFiles = [];
        $product_data = $request->except('images');
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->storeAs('uploads/', $imageName);
                $allFiles[] = $imageName;
            }
        }else{
            $allFiles = [];
        }
         
        $product_data['images'] = json_encode($allFiles);
        // dd($product_data);
        Product::create($product_data);
        return back()->with('success' , 'Product added successfully');
    }

    // add category
    public function create_category(Request $request){        
        $request->validate([
            'cat_name' => 'required',
            'cat_description' => 'required'
        ]);

       Category::create($request->all());
        return back()->with('status' , 'category added successfully');
    }

    public function edit_product(Request $request){
        $product_data = Product::find($request->product_id);
        $view =  view('admin.includes.edit_product',compact('product_data'))->render();
        return $view;
    }

    public function update_product(Request $request, $id){
        // dd($request->all());
        $product_data = $request->except('images');
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->storeAs('uploads/', $imageName);
                $allFiles[] = $imageName;
            }
        }else{
            $allFiles = [];
        }
        $product_data['images'] = json_encode($allFiles);
        $product = Product::find($id);
        $product->update($product_data);
        return back()->with('success' , 'Data Successfully Updated');
    }

    public function delete_product(Request $request){        
        $product_data = Product::find($request->product_id);
        if(!empty($product_data)){
            $product_data->delete();
            return back()->with('success' , 'User delete successfully');
        }else{
            return back()->with('error' , 'User not found');
        }
    }







}
