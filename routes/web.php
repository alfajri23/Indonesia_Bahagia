<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

Route::prefix('oauth')->group(function(){
    Route::get('google/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('google/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToGoogle'])->name('callbackToGoogle');

    Route::get('facebook/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToFacebook'])->name('redirectToFacebook');
    Route::get('facebook/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToFacebook'])->name('callbackToFacebook');

    Route::get('twitter/redirect', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'redirectToTwitter'])->name('redirectToTwitter');
    Route::get('twitter/callback', [ Controllers\Auth\OAuth\LoginOAuthController::class, 'callbackToTwitter'])->name('callbackToTwitter');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [ Controllers\Home\Admin\AdminHomeController::class,'index'])->name('homeAdmin');
});

Route::prefix('blog')->group(function(){

    Route::get('/', [ Controllers\Blog\User\BlogUserController::class,'index'])->name('blogUser');
    Route::get('/detail/{id}', [ Controllers\Blog\User\BlogUserController::class,'detail'])->name('blogDetailUser');
    Route::get('/filter', [ Controllers\Blog\User\BlogUserController::class,'filterByCategory'])->name('filterByCategory');

    //Komentar
    Route::post('/komentar/store', [ Controllers\Blog\User\BlogUserController::class,'storeKomentar'])->name('blogStoreKomentar');
    Route::post('/komentar/delete', [ Controllers\Blog\User\BlogUserController::class,'deleteKomentar'])->name('blogDeleteKomentar');

    Route::prefix('admin')->group(function(){
        Route::get('/', [ Controllers\Blog\Admin\BlogAdminController::class,'index'])->name('blogAdmin');
        Route::get('/unpublishs', [ Controllers\Blog\Admin\BlogAdminController::class,'blogUnpublish'])->name('blogAdminUnpublish');
        Route::get('/create', [ Controllers\Blog\Admin\BlogAdminController::class,'add'])->name('blogAdd');
        Route::post('/store', [ Controllers\Blog\Admin\BlogAdminController::class,'store'])->name('blogStoreAdmin');
        Route::get('/edit/{id}', [ Controllers\Blog\Admin\BlogAdminController::class,'edit'])->name('blogEditAdmin');

        //action
        Route::get('unpublish', [Controllers\Blog\Admin\BlogAdminController::class,'unpublish'])->name('blogUnpublish');
        Route::get('publish', [Controllers\Blog\Admin\BlogAdminController::class,'publish'])->name('blogPublish');
        Route::get('delete', [Controllers\Blog\Admin\BlogAdminController::class,'delete'])->name('blogDelete');
    
        //kategories
        Route::get('/kategori', [Controllers\Blog\Admin\BlogAdminController::class,'blogKategori'])->name('blogKategori');
        Route::post('/kategori/store', [Controllers\Blog\Admin\BlogAdminController::class,'storeBlogKategori'])->name('storeBlogKategori');
        Route::get('/kategori/delete/{id}', [Controllers\Blog\Admin\BlogAdminController::class,'deleteBlogKategori'])->name('deleteBlogKategori');
    });
});

Route::prefix('master')->group(function(){
    Route::get('/kontak', [ Controllers\Master\Kontak\KontakController::class,'index'])->name('masterKontak');
    Route::post('/kontak', [ Controllers\Master\Kontak\KontakController::class,'store'])->name('masterStoreKontak');
});


//USER

Route::get('/profile', [ Controllers\Akun\User\UserController::class,'profile'])->name('profile');
Route::post('/update-profile', [ Controllers\Akun\User\UserController::class,'update'])->name('profileUpdate');


Route::group(['middleware' => ['auth']], function() {
    
    // Verification Routes
    Route::get('/email/verify', [ Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [ Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [ Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::group(['middleware' => ['verified']], function() {
        Route::get('/', [Controllers\Home\User\UserHomeController::class, 'index'])->name('homeUser');
    });

});


