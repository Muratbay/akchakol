<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AddController;
use App\Models\Contact;
use app\Models\Reason;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/check',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/',[IndexController::class,'index']);

Route::get('/admin',function(){
    return view('admin.admin');
})->middleware('auth');


Route::post('/contact',[AddController::class,'store']);

Route::middleware('auth')->group(function(){

   

});
 Route::get('/admin',function(){
        return view('admin.admin');
    });


Route::resource('reasons',ReasonController::class);
Route::resource('places',PlaceController::class);
Route::resource('contacts',ContactController::class);

