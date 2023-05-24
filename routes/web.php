<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorLoginController;
use App\Http\Controllers\DonorRegisterController;
use App\Http\Controllers\RaiserController;
use App\Http\Controllers\RaiserLoginController;
use App\Http\Controllers\RaiserRegisterController;

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

Auth::routes();

Route::get('/', function () {
    return view('landing');
})->name('landingPage');

Route::get('/user/login', [DonorLoginController::class,'showLoginForm'])->name('donor.login');

//---------------------------------------------------Admin---------------------------------------------------//
Route::group(['middleware' => ['role:2']], function () {
    //admin-donor
    Route::get('/admin/donor', [AdminController::class,'showDaftarDonor'])->name('donor.list');
    Route::get('/admin/donor/add', [AdminController::class,'showFormDonorAdd']);
    Route::post('/admin/donor/store', [AdminController::class,'store'])->name('donor.store');
    Route::get('/admin/donor/edit/{id}', [AdminController::class,'edit'])->name('donor.edit');
    Route::put('/admin/donor/update/{id}', [AdminController::class,'update'])->name('donor.update');
    Route::delete('/admin/donor/delete/{id}', [AdminController::class,'delete'])->name('donor.delete');
    //admin-raiser
    Route::get('/admin/raiser', [AdminController::class,'showDaftarRaiser'])->name('raiser.listRaiser');
    Route::get('/admin/raiser/add', [AdminController::class,'showFormRaiserAdd']);
    Route::post('/admin/raiser/store', [AdminController::class,'storeRaiser'])->name('raiser.storeRaiser');
    Route::get('/admin/raiser/edit/{id}', [AdminController::class,'editRaiser'])->name('raiser.editRaiser');
    Route::put('/admin/raiser/update/{id}', [AdminController::class,'updateRaiser'])->name('raiser.updateRaiser');
    Route::delete('/admin/raiser/delete/{id}', [AdminController::class,'deleteRaiser'])->name('raiser.deleteRaiser');
    //logout
    Route::get('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');
});

//Donor
Route::group(['middleware' => ['role:0']], function () {
    Route::get('/donor/logout', [DonorLoginController::class,'logout'])->name('donor.logout');
    Route::get('/donor/register', [DonorRegisterController::class,'showRegisterForm']);
    Route::post('/donor/store', [DonorRegisterController::class,'store'])->name('donor.register');
    Route::get('/donor/dashboard', [DonorController::class,'dashboard'])->name('donor.dashboard');
});

//Raiser
Route::group(['middleware' => ['role:1']], function () {
    Route::get('/raiser/logout', [RaiserLoginController::class,'logout'])->name('raiser.logout');
    Route::get('/raiser/register', [RaiserRegisterController::class,'showRegisterForm']);
    Route::post('/raiser/store', [RaiserRegisterController::class,'store'])->name('raiser.register');
    Route::get('/raiser/dashboard', [RaiserController::class,'dashboard'])->name('raiser.dashboard');
    Route::get('/raiser/activity/add', [RaiserController::class,'showFormActivityAdd'])->name('activity.add');
});

// Route::get('/admin/login', [AdminLoginController::class,'showLoginForm']);
// Route::post('/admin/login/submit', [AdminLoginController::class,'login'])->name('admin.submitLogin');
// Route::post('/donor/login/submit', [DonorLoginController::class,'login'])->name('donor.submitLogin');
// Route::get('/raiser/login', [RaiserLoginController::class,'showLoginForm']);
// Route::post('/raiser/login/submit', [RaiserLoginController::class,'login'])->name('raiser.submitLogin');