<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProudctController;
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

Route::get('/',[HomeController::class,'home'])->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', [HomeController::class,'home'])->name('dashboard');
// });

Route::get('/logout',function(){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Route::middleware(['auth:sanctum','isAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin');
    Route::get('/view_category',[AdminController::class,'view_category']);
    Route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
    Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category');

    //product
    Route::resource('product', ProudctController::class,[
        'names' => [
            'index' => 'product.index',
            'create' => 'product.create',
            'store' => 'product.store',
            'show' => 'product.show',
            'edit' => 'product.edit',
            'update' => 'product.update',
            'destroy' => 'product.destroy',
        ]
    ]);
});