<?php

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

/*
Route::get('/', function() {
	return view('home');
})->name('home');

Route::group(['prefix' => 'do'], function() {
	Route::get('/greet/{name?}', function($name = null) {
		return view('actions.greet', ['name' => $name]);
	})->name('greet');

	Route::get('/smile', function() {
		return view('actions.smile');
	})->name('smile');

	Route::get('/wave', function() {
		return view('actions.wave');
	})->name('wave');

	Route::post('/', function(\Illuminate\Http\Request $request){
		if (isset($request['action']) && $request['name']) {
			if (strlen($request['name']) > 0) {
				return view('actions.nice',['action' => $request['action'], 'name' => $request['name']]);
			}
			return redirect()->back();
		}
		return redirect()->back();
	})->name('benice');
});

*/

Route::group(['middleware' => ['web']], function(){

	Route::get('/', [
		'uses' => 'NiceActionController@getHome',
		'as' => 'home'
	]);


	Route::group(['prefix' => 'do'], function() {
		Route::get('/{action}/{name?}', [
			'uses' => 'NiceActionController@getNiceAction',
			'as' => 'niceaction' 
		]);

		Route::get('greet', [
	        'uses' => 'NiceActionController@getGreet',
	        'as' => 'greet'
	    ]);

	    Route::get('hug/{name?}', [
	        'uses' => 'NiceActionController@getHug',
	        'as' => 'hug'
	    ]);

	    Route::get('wave', [
	        'uses' => 'NiceActionController@getWave',
	        'as' => 'wave'
	    ]);

		Route::post('/add_action', [
			'uses' => 'NiceActionController@postInsertNiceAction',
			'as' => 'add_action'
		]);
	});
});

