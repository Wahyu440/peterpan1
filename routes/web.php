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
    Route::delete('/admin/donor/delete/{id}', [AdminController::class,'delete'])->name('donor.delete');
    //admin-raiser
    Route::get('/admin/raiser', [AdminController::class,'showDaftarRaiser'])->name('raiser.listRaiser');
    Route::get('/admin/raiser/add', [AdminController::class,'showFormRaiserAdd']);
    Route::post('/admin/raiser/store', [AdminController::class,'storeRaiser'])->name('raiser.storeRaiser');
    Route::delete('/admin/raiser/delete/{id}', [AdminController::class,'deleteRaiser'])->name('raiser.deleteRaiser');
    //logout
    Route::get('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');
});

//Donor
Route::get('/donor/register', [DonorRegisterController::class,'showRegisterForm']);
Route::post('/donor/store', [DonorRegisterController::class,'store'])->name('donor.register');
Route::group(['middleware' => ['role:0']], function () {
    Route::get('/donor/logout', [DonorLoginController::class,'logout'])->name('donor.logout');
    Route::get('/donor/dashboard', [DonorController::class,'dashboard'])->name('donor.dashboard');
    Route::post('/donor/activity/sort', [DonorController::class,'sortByType'])->name('activity.sort');
    Route::get('/donor/profile', [DonorController::class,'profile'])->name('donor.profile');
    Route::get('/donor/profile/edit/{id}', [DonorController::class,'editProfile'])->name('donor.editProfile');
    Route::put('/donor/profile/update/{id}', [DonorController::class,'updateProfile'])->name('donor.updateProfile');
    Route::get('/donor/donation/form/{id}', [DonorController::class,'formDonate'])->name('donor.formDonate');
    Route::post('/donor/donation/donate', [DonorController::class,'donate'])->name('donor.donate');
    Route::get('/donor/activity/detail/{id}', [DonorController::class,'detail'])->name('activity.detail');
    Route::get('/donor/donation/list', [DonorController::class,'list'])->name('donation.list');
    Route::delete('/donor/donation/delete/{id}', [DonorController::class,'delete'])->name('donation.delete');
    // Route::get('/donor/donation/upload/{id}', [DonorController::class,'uploadPayment'])->name('donor.uploadPayment');
    Route::put('/donor/donation/payment/{id}', [DonorController::class,'payment'])->name('donation.payment');
});

//Raiser
Route::get('/raiser/register', [RaiserRegisterController::class,'showRegisterForm']);
Route::post('/raiser/store', [RaiserRegisterController::class,'store'])->name('raiser.register');
Route::group(['middleware' => ['role:1']], function () {
    Route::get('/raiser/logout', [RaiserLoginController::class,'logout'])->name('raiser.logout');
    Route::get('/raiser/dashboard', [RaiserController::class,'dashboard'])->name('raiser.dashboard');
    Route::get('/raiser/activity/add', [RaiserController::class,'showFormActivityAdd'])->name('activity.add');
    Route::post('/raiser/activity/store', [RaiserController::class,'store'])->name('activity.store');
    Route::get('/raiser/activity/detail/{id}', [RaiserController::class,'detail'])->name('activity.detail');
    Route::get('/raiser/activity/edit/{id}', [RaiserController::class,'edit'])->name('activity.edit');
    Route::put('/raiser/activity/update/{id}', [RaiserController::class,'update'])->name('activity.update');
    Route::delete('/raiser/activity/delete/{id}', [RaiserController::class,'delete'])->name('activity.delete');
    Route::get('/raiser/profile', [RaiserController::class,'profile'])->name('raiser.profile');
    Route::get('/raiser/profile/edit/{id}', [RaiserController::class,'editProfile'])->name('raiser.editProfile');
    Route::put('/raiser/profile/update/{id}', [RaiserController::class,'updateProfile'])->name('raiser.updateProfile');
    Route::get('/raiser/activity/detailDonation/{id}', [RaiserController::class,'list'])->name('activity.detailDonation');
});

// Route::get('/admin/login', [AdminLoginController::class,'showLoginForm']);
// Route::post('/admin/login/submit', [AdminLoginController::class,'login'])->name('admin.submitLogin');
// Route::post('/donor/login/submit', [DonorLoginController::class,'login'])->name('donor.submitLogin');
// Route::get('/raiser/login', [RaiserLoginController::class,'showLoginForm']);
// Route::post('/raiser/login/submit', [RaiserLoginController::class,'login'])->name('raiser.submitLogin');
// Route::get('/admin/donor/edit/{id}', [AdminController::class,'edit'])->name('donor.edit');
// Route::put('/admin/donor/update/{id}', [AdminController::class,'update'])->name('donor.update');
// Route::get('/admin/raiser/edit/{id}', [AdminController::class,'editRaiser'])->name('raiser.editRaiser');
// Route::put('/admin/raiser/update/{id}', [AdminController::class,'updateRaiser'])->name('raiser.updateRaiser');