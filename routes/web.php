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
    return view('generateConfig');
});

Route::name('generate::')->prefix('generate')->group(function(){
  Route::name('example2')->any('/example2', function(Request $request){
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
  Route::name('example')->any('/', function(Request $request){
    $Examples = \App\Models\Example::where('result', '>=', 0);

    if(isset($request->example_notNull)) {
      $Examples = $Examples->where([
        ['param1', '!=', 0],
        ['param2', '!=', 0],
      ]);
    }

    $Or = false;
    if(isset($request->example_plus)) {
      $WhereOpt = [
        ['operation', '=', 0],
        ['result', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ];
      $Or ?
        $Examples = $Examples->orWhere($WhereOpt)
        :
        $Examples = $Examples->where($WhereOpt);
      $Or = true;
    }

    if(isset($request->example_minus)) {
      $WhereOpt = [
        ['operation', '=', 1],
        ['param1', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ];
      $Or ?
        $Examples = $Examples->orWhere($WhereOpt)
        :
        $Examples = $Examples->where($WhereOpt);
      $Or = true;
    }

    if(isset($request->example_multiply)) {
      $WhereOpt = [
        ['operation', '=', 2],
        ['result', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ];
      $Or ?
        $Examples = $Examples->orWhere($WhereOpt)
        :
        $Examples = $Examples->where($WhereOpt);
      $Or = true;
    }

    if(isset($request->example_division)) {
      $WhereOpt = [
        ['operation', '=', 3],
        ['param1', '<=', $request->example_max],
        ['itemWhy', !isset($request->example_itemWhy)?'=':'<=', 2]
      ];
      $Or ?
        $Examples = $Examples->orWhere($WhereOpt)
        :
        $Examples = $Examples->where($WhereOpt);
      $Or = true;
    }

    return view('grid', [
      'Examples' => $Examples->whereNotNull('display')->take($request->example_count ?? 100)->inRandomOrder()->get()
    ]);

  });
});
