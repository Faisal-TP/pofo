<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;

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
// Route::get('pofoadmin/', function () {
//     return view('welcome');
// });
Route::view('pofoadmin','admin/login');
Route::post('pofoadmin', 'admin@adminLogin');
Route::get('adminHome', 'admin@adminHome');
// Route::view('customer', 'admin/cutomerManage');
Route::get('customer', 'admin@showcustomer');
Route::post('customer', 'admin@custmerRegistration');
Route::get('delete/{id}', 'admin@deletecustomer');
Route::view('upload_images', 'admin/uploadImage');
Route::post('upload_images', 'admin@uploadImages');