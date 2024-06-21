<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Response;
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
            $image->storeAs('storage/app/uplods', $imageName);
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
        $products = Product::all();
        return view('admin.products')->with(compact('products'));
    }

    public function create_product(Request $request){
        dd($request->all());
    }



}
