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
\Illuminate\Support\Facades\URL::forceRootUrl(env('APP_URL'));
Route::get('/', ['uses' => 'Index@index']);
Route::get('/add', ['uses' => 'Index@add']);
Route::post('/add', ['uses' => 'Index@store'])->name('store');
