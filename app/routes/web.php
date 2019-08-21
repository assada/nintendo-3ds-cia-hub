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

$url = parse_url(env('APP_URL'));
\Illuminate\Support\Facades\URL::forceRootUrl($url['host']);
\Illuminate\Support\Facades\URL::forceScheme($url['scheme']);

Route::get('/', ['uses' => 'Index@index']);
Route::get('/add', ['uses' => 'Index@add']);
Route::post('/add', ['uses' => 'Index@store'])->name('store');
