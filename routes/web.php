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

Route::get('/', [Controllers\Home\User\UserHomeController::class, 'index'])->name('homeUser');

Route::get('/pembayaran/{id}', [Controllers\Pembayaran\User\PembayaranUserController::class, 'pembayaran'])->name('pembayaran');

//* Event
Route::get('/event', [Controllers\Home\User\UserHomeController::class, 'event'])->name('event');
Route::get('/event/{id}', [Controllers\Event\User\EventUserController::class, 'detail'])->name('eventDetail');

//* PROFILE
Route::get('/profile', [ Controllers\Akun\User\UserController::class,'profile'])->name('profile');
Route::post('/update-profile', [ Controllers\Akun\User\UserController::class,'update'])->name('profileUpdate');

//* INFORMASI
Route::get('/terms-and-conditions', [ Controllers\Master\Informasi\InformasiController::class,'termCondition'])->name('termCondition');
Route::get('/about', [ Controllers\Master\Informasi\InformasiController::class,'about'])->name('about');
Route::get('/privacy-policy', [ Controllers\Master\Informasi\InformasiController::class,'privacy'])->name('privacy');



Route::prefix('forum')->group(function(){
    Route::get('/', [ Controllers\Forum\User\ForumUserController::class,'index'])->name('forum');
    Route::post('/', [ Controllers\Forum\User\ForumUserController::class,'store'])->name('forumStore');
    Route::get('detail/{id}', [Controllers\Forum\User\ForumUserController::class,'detail'])->name('forumDetail');
    Route::get('detail-json', [ Controllers\Forum\User\ForumUserController::class,'show'])->name('forumDetailJson');
    Route::post('delete', [Controllers\Forum\User\ForumUserController::class,'delete'])->name('forumDelete');

    //KOMENTAR
    Route::post('komentar/jawaban', [Controllers\Forum\User\ForumUserController::class,'komentar'])->name('forumStoreKomentar');
    Route::get('komentar/detail', [Controllers\Forum\User\ForumUserController::class,'showKomentar'])->name('forumShowKomentar');
    Route::post('komentar/delete', [Controllers\Forum\User\ForumUserController::class,'deleteKomentar'])->name('forumDeleteKomentar');

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
        Route::get('/preview/{id}', [ Controllers\Blog\Admin\BlogAdminController::class,'preview'])->name('blogPreviewAdmin');

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

    Route::get('/informasi', [ Controllers\Master\Informasi\InformasiController::class,'index'])->name('masterInformasi');
    Route::get('/informasi/edit', [ Controllers\Master\Informasi\InformasiController::class,'add'])->name('masterAddInformasi');
    Route::get('/informasi/delete/{id}', [ Controllers\Master\Informasi\InformasiController::class,'delete'])->name('masterDeleteInformasi');
    Route::post('/informasi/store', [ Controllers\Master\Informasi\InformasiController::class,'store'])->name('masterStoreInformasi');
});



Route::group(['middleware' => ['auth']], function() {
    
    // Verification Routes
    Route::get('/email/verify', [ Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [ Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [ Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::group(['middleware' => ['verified']], function() {
        
    });

});

//*Admin 
Route::get('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'index'])->name('loginAdmin');
Route::post('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'login'])->name('authAdmin');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [ Controllers\Home\Admin\AdminHomeController::class,'index'])->name('homeAdmin');

    //* PRODUK
    Route::prefix('event')->group(function(){
        Route::get('/', [Controllers\Event\Admin\EventAdminController::class,'event'])->name('eventAdmin');
        Route::get('past', [Controllers\Event\Admin\EventAdminController::class,'eventPast'])->name('eventPast');
        Route::get('restore', [Controllers\Event\Admin\EventAdminController::class,'eventRestore'])->name('restoreEvent');
        Route::get('edit', [Controllers\Event\Admin\EventAdminController::class,'eventEdit'])->name('editEvent');
        Route::get('add', [Controllers\Event\Admin\EventAdminController::class,'eventAdd'])->name('addEvent');
        Route::post('save', [Controllers\Event\Admin\EventAdminController::class,'eventSave'])->name('saveEvent');
        Route::get('end', [Controllers\Event\Admin\EventAdminController::class,'eventEnd'])->name('endEvent');
        Route::get('start', [Controllers\Event\Admin\EventAdminController::class,'eventStart'])->name('startEvent');
        Route::get('delete', [Controllers\Event\Admin\EventAdminController::class,'eventDelete'])->name('deleteEvent');
    });

});