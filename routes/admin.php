<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Authentication\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login',              [LoginController::class,'login']);
Route::post('/login',             [LoginController::class,'authenticate'])->name('login');
Route::get('/logout',             [LoginController::class,'logout'])->name('logout');

Route::group(['middleware'=>['lang']],function(){
 // language
 Route::get('lang/{lang}', function ($lang)
 {
     session()->has('lang')?session()->put('lang','ar'):'';
     $lang == 'ar'?session()->put('lang','ar'):session()->put('lang','en') ;
     return back();
 });
Route::group(['middleware'=>['auth','role'],'prefix' => 'admin', 'as' => 'admin.'],function(){



    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');

    Route::get('/users/profile', [UserController::class,'profile']);
    Route::put('/users/profile', [UserController::class,'update_profile'])->name('users.update-profile');
    Route::get('/users/change-password', [UserController::class,'change_password']);
    Route::put('/users/change-password', [UserController::class,'update_password'])->name('users.update-password');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);



});

Route::group(['middleware'=>['auth'],'prefix' => 'client', 'as' => 'client.'],function(){

    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');

    Route::get('/users/profile', [UserController::class,'profile']);
    Route::put('/users/profile', [UserController::class,'update_profile'])->name('users.update-profile');
    Route::get('/users/change-password', [UserController::class,'change_password']);
    Route::put('/users/change-password', [UserController::class,'update_password'])->name('users.update-password');

   //Route::get('/index',[HomeController::class,'index'])->name('index');

});
});
