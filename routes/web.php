<?php

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


Route::middleware('admin')->group(static function() {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->group(static function () {
        Route::prefix('users')->group(static function () {
            Route::get('/', 'AdminUsersController@users')->name('users');
            Route::get('/user/{id}', 'AdminUsersController@userDetail')->name('userdetail');
            Route::get('/user/new', 'AdminUsersController@userDetail')->name('newuser');
            Route::get('/user/new', 'AdminUsersController@saveUserDetail');
            Route::post('/user/{id}', 'AdminUsersController@saveUserDetail');
        });
            Route::get('/invoervelden', 'AdminUsersController@invoervelden')->name('invoervelden');
            Route::post('/invoervelden/create','InvoerveldController@create')->name('createinvoerveld');
            Route::get('/rooster',  [App\Http\Controllers\BewakingsController::class, 'showRooster'])->name('bewakingsrooster');
    });
});


Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rooster', [App\Http\Controllers\BewakingsController::class, 'index'])->name('rooster');
Route::post('/rooster', [App\Http\Controllers\BewakingsController::class, 'saveRooster'])->name('rooster');
Route::get('/mijngegevens', [App\Http\Controllers\UsersController::class, 'mijngegevens'])->name('mijngegevens');

//Route::get('/parseCSV', [App\Http\Controllers\Admin\AdminUsersController::class, 'parseCSV'])->name('parseCSV');



