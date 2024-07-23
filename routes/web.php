<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TransactionController::class,'register_view'])->name('register');
Route::post('/postregister',[TransactionController::class,'postregister'])->name('postregister');
Route::get('/login',[TransactionController::class,'login_view'])->name('login_view');
Route::post('/login',[TransactionController::class,'login'])->name('login');
Route::group(['middleware' => 'auth'], function () {
Route::group(['prefix'=>'Admin'],function(){
    Route::get('/dashboard',[TransactionController::class,'dashboard'])->name('dashboard'); 
    Route::get('/tration_view',[TransactionController::class,'tration_view'])->name('tration_view');  
    Route::get('/tration_create',[TransactionController::class,'tration_create'])->name('tration_create');  
    Route::post('/tration_create',[TransactionController::class,'tration_post'])->name('tration_post');  
    Route::get('/tration_edit/{id}',[TransactionController::class,'tration_edit'])->name('edit');  
    Route::post('/tration_update',[TransactionController::class,'tration_update'])->name('tration_update');  
    Route::post('/delete_data', [TransactionController::class, 'delete_data'])->name('delete_data');
});
});
Route::get('/logout',[TransactionController::class,'logout'])->name('logout');


