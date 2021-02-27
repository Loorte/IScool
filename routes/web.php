<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('config');
});

Route::name('generate::')->prefix('generate')->group(function(){
  Route::name('example1')->any('/', function(Request $request){
    $Examples = \App\Models\Example::where('result', '>=', 0);



    if(isset($request->example_plus) && isset($request->example_minus)) {
      $Examples->where([
        ['operation', '=', 0],
        ['result', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ])
      ->orWhere([
        ['operation', '=', 1],
        ['param1', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ]);
    }

    if(isset($request->example_plus) && !isset($request->example_minus)) {
      $Examples->where([
        ['operation', '=', 0],
        ['result', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ]);
    }

    if(!isset($request->example_plus) && isset($request->example_minus)) {
      $Examples->where([
        ['operation', '=', 1],
        ['param1', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ]);
    }

    return view('grid', [
      'Examples' => $Examples->take($request->example_count ?? 10)->inRandomOrder()->get()
    ]);
  });
});
