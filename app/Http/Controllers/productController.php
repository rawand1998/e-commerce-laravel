<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Session;
class productController extends Controller
{
    function index(){
       $data =Product::all();
        return  view('products',['products' => $data]);
    }
    function detail($id){
        $data = Product::find($id);
        return  view('detail',['product' => $data]);
       
    }
    function addToCart(Request $request){
        if($request->session()->has('user')){
           $cart = new Cart;
           $cart->user_id = $request->session()->get('user')['id'];
           $cart->product_id= $request->product_id;
           $cart->save();
           return redirect('/');
        }else{
            return redirect('/login');}

    }
    static function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList(){
        $userId=Session::get('user')['id'];
        $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->select('products.*','cart.id as cart_id')
         ->get();
 
         return view('cartlist',['products'=>$products]);
    }
    
}

