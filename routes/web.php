<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\HomeController;

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

//Route::get('/dump','UserController@push_early_data');

Route::get('/forgot_password',[HomeController::class, 'forgot_password_page']);

Route::post('/forgot_password',[HomeController::class, 'forgot_password']);

Route::get('/reset_password/{token}/{email}',[HomeController::class, 'reset_password_page']);

Route::post('/reset_password',[HomeController::class, 'reset_password']);

Route::get('/logout',[HomeController::class, 'logout']);

Route::get('/dashboard',[HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/gallery',function(){
    return view('gallery');
})->middleware('auth');

Route::middleware('guest')->group(function(){

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/login', [HomeController::class, 'login_page'])->name('login');

    Route::post('/login', [HomeController::class, 'login']);

    Route::get('/register', [HomeController::class, 'register_page']);

    Route::post('/register', [HomeController::class, 'register']);

});

Route::middleware('auth')->group(function(){

    Route::get('/profile','UserController@profile_page');

    Route::put('/profile','UserController@profile');

    Route::get('/password','UserController@update_password_page');

    Route::put('/password','UserController@update_password');

    Route::post('/picture','UserController@upload_picture');

});

Route::middleware('auth')->name('user.')->prefix('user')->group(function () {

    Route::get('/',[UserController::class, 'display_user'])->name('display');

    Route::get('/create',[UserController::class, 'create_user_page'])->name('create');

    Route::post('/create',[UserController::class, 'create_user']);

    Route::get('/edit/{user}',[UserController::class, 'edit_user_page']);

    Route::put('/edit/{user}',[UserController::class, 'update_user']);

    Route::delete('/delete/{user}',[UserController::class, 'delete_user']);

    Route::get('view/{user}',[UserController::class, 'view_user']);

    Route::get('excel', [UserController::class, 'excel_page'])->name('excel');

    Route::post('excel', [UserController::class, 'excel']);

    Route::post('excel_confirm', [UserController::class, 'excel_confirm']);
});

Route::middleware('auth')->name('configuration')->prefix('config')->group(function () {

    Route::get('/',[ConfigurationController::class, 'update_page']);

    Route::put('/',[ConfigurationController::class, 'update']);

});

Route::middleware('auth')->resource('products', 'ProductController');
Route::middleware('auth')->resource('purchases', 'PurchaseController');
Route::middleware('auth')->resource('feedbacks', 'FeedbackController');
