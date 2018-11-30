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

Route::get('/{slug}', 'PathDecodeController@decode')->where('slug', '[A-Za-z]{5}');

Route::post('/encodepath', 'PathEncoderController@encode');

Route::get('/', function(){
    return view('encodeForm');
});
