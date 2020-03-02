<?php
use App\Parking;
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
//Route::get('/index', 'ParkingController@index')->name('index');

Route::get('/', 'ParkingController@index');


//登録があった時のルーティング
//＠の先はコントローラーのcreateメソッドに繋げる
//もし、'/'にすると、つながらない(404notfound)ので注意！！
//一番参考になりそう https://www.ritolab.com/entry/119#aj_2
Route::post('/create', 'ParkingController@create');

//	====calculation===============================================
Route::post('/calculation', 'ParkingController@calculation');

//	====edit======================================================
Route::get('/edit/{id}', 'ParkingController@edit')->name('parking_edit');
Route::post('/edit/{id}', 'ParkingController@update')/*->name('parking_update')*/;

//Route::post('/delete/{id}', 'ParkingController@delete');
//Route::post('/delete', 'ParkingController@delete');
//Route::delete('/delete/{parking_id}', 'ParkingController@delete');
Route::delete('/delete/{id}', 'ParkingController@delete');

//以下

//要る？？なぜ逆戻り？？
//以下、参考 https://www.ritolab.com/entry/49
//Route::get('coinparking/model', 'ParkingController@model');

//Route::get('coinparking/complete', 'ParkingController@index');

//登録
// Route ::post('/coinparking', function(Request $request){

// });

Route::get('/carbon', 'CarbonController@getIndex');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
