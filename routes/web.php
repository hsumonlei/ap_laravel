<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

/*use App\Http\Controllers\UserController;*/

//Route::get('/', [HomeController::class, 'index']);

//Route::get('/',[HomeController::class, 'testroot'])->name('root');
Route::resource('posts',HomeController::class);
Route::get('logout',[AuthController::class,'logout']);
//Route::get('info', function() { phpinfo(); });

//Route::get('contact', [HomeController::class, 'contact']);
//Route::get('about', [HomeController::class, 'about']);

// Route::get('/', function () {
//     $data = [
//         'home_key' => 'home_value',
//         'sub_home_key' => 'sub_home_value',
//     ];
//     return view('home', compact('data'));
// });

// Route::get('contact', function(){
//     $data = [
//         'contact_key' => 'contact_value',
//         'sub_contact_key' => 'sub_contact_value',
//     ];
//     return view('contact', compact('data'));
// });


// Route::get('about', function(){
//     $data = [
//         'about_key' => 'about_value',
//         'sub_about_key' => 'sub_about_value',
//     ];
//     return view('about', compact('data'));
// });
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[HomeController::class, 'index']);
