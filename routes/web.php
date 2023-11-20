<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WalletViewController;
use App\Http\Controllers\WalletController;


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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/Admin', [UserProfileController::class, 'adminprofile'])->middleware('auth')->name('Admin.adminprofile');
Route::get('/Manager', [UserProfileController::class, 'managerprofile'])->middleware('auth')->name('Manager.managerprofile');
Route::get('/Customer', [UserProfileController::class, 'customerprofile'])->middleware('auth')->name('Customer.customerprofile');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

Route::get('/ForgotPassword',[ForgotPasswordController::class,'ForgotPassword'])->name(name:'ForgotPassword');
Route::post('/ForgotPassword',[ForgotPasswordController::class,'ForgotPasswordPost'])->name(name:'ForgotPasswordPost');
Route::get('/reset-password/{token}',[ForgotPasswordController::class, "resetPassword"])->name(name:"reset.password");
Route::post('/reset-password',[ForgotPasswordController::class, "resetPasswordPost"])->name(name:"reset.password.post");

Route::get('/wallet/check', [WalletViewController::class, 'showCheckBalanceForm']);
Route::get('/wallet/deposit', [WalletViewController::class, 'showDepositForm']);
Route::get('/wallet/withdraw', [WalletViewController::class, 'showWithdrawForm']);

Route::prefix('wallet')->group(function () {
    Route::get('/{walletId}', [WalletController::class, 'checkBalance']);
    Route::post('/deposit/{walletId}', [WalletController::class, 'deposit']);
    Route::post('/withdraw/{walletId}', [WalletController::class, 'withdraw']);
});