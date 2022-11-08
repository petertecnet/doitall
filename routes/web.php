<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlagioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dados/{cpf}', [App\Http\Controllers\PlagioController::class, 'dados'])->name('dados');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth.role:0'], function () {
 Route::resource('users', UserController::class );

Route::resource('companies', CompanyController::class );
Route::resource('products', ProductController::class );

Route::group(['middleware' => 'auth.role:9'], function () {

Route::resource('products', ProductController::class );

});
});
