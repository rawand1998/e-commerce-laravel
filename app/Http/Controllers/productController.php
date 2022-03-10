<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

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
}
