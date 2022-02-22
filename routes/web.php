<?php

use App\Test;
use App\Container;
use App\TestFacade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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



/* Route::get('/', function(){

    $container = new Container();
    $container->bind('test',function(){
        return new Test();
    });
        $test =$container->resolve('test');
        
        dd($test->smth());

}); */
/* Route::get('/', function(){
    app()->bind('test',function(){
        return new Test('Hsu');
    });

   $test = resolve('test');
   //$test = resolve(App\Test::class); 


   dd($test);
}); */


Route::resource('posts',HomeController::class);

Route::get('logout',[AuthController::class,'logout']);

Route::get('/',function(){
    //return TestFacade::execute();
    //dd(app('test')->execute());
    //dd(TestFacade::execute());

    return view('welcome');
    //dd(resolve('view'));
    //return Request::input('name');
    //return request('name');
   //return view('welcome'); //view facades getFacadeAccessor() used
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[HomeController::class, 'index']);

// Route::get('/',function(){
//     dd(resolve('test'));

// });