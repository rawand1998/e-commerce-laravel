<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\userController;
use App\Http\controllers\productController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/master', function () {
    return view('master');
});
Route::get('/login', function () {
    return view('login');
});
Route::post("/login",[userController::class,'login']);

Route::get("/",[productController::class,'index']);



Route::get("/detail/{id}",[productController::class,'detail']);


Route::post("add_to_cart",[productController::class,'addToCart']);

Route::get("/logout",function(){
    Session::forget('user');
    return redirect('/login');
});