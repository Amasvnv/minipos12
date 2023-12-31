<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\StoreController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register',[Usercontroller::class,'register']);
Route::post('login',[Usercontroller::class,'login']);
// Route::post('logout',[Usercontroller::class,'logout']);
Route::get('logout',[UserController::class,'logout']);


Route::controller(StoreController::class)->group(function (){
    Route::get('store','index');
    Route::get('store_pos','index_pos');
    Route::get('store/edit/{id}','edit');
    Route::post('store/add','add');
    Route::post('store/update/{id}','update');
    Route::delete('store/delete/{id}','delete'); 
});