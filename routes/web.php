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

//* PRODUK
Route::get('/produk/{id}', [Controllers\Produk\User\ProdukUserController::class, 'index'])->name('produkDetail');

//* Event
Route::get('/event', [Controllers\Home\User\UserHomeController::class, 'event'])->name('event');

//* Konsultasi
Route::get('/konsultasi', [Controllers\Konsultasi\User\KonsultasiUserController::class, 'listKonsultan'])->name('tipeKonsultasi');
Route::get('/konsultasi/detail/{id}', [Controllers\Konsultasi\User\KonsultasiUserController::class, 'detailKonsultan'])->name('detailKonsultasi');

//* PROFILE
Route::get('/profile', [ Controllers\Akun\User\UserController::class,'profile'])->name('profile');
Route::get('/change-password', [ Controllers\Akun\User\UserController::class,'changePassword'])->name('changePassword');
Route::post('/update-profile', [ Controllers\Akun\User\UserController::class,'update'])->name('profileUpdate');
Route::post('/update-password', [ Controllers\Akun\User\UserController::class,'updatePassword'])->name('passwordUpdate');

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
    Route::get('show', [Controllers\Forum\User\ForumUserController::class,'show'])->name('forumDetailAjax');
    //KATEGORI
    Route::post('forum/add-kategori', [Controllers\Forum\User\ForumUserController::class,'createKategori'])->name('forumStoreKategori');

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
        //* PEMBAYARAN
        Route::get('/pembayaran/{id}', [Controllers\Pembayaran\User\PembayaranUserController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/riwayat-pembayaran', [Controllers\Pembayaran\User\PembayaranUserController::class, 'riwayat'])->name('pembayaranRiwayat');
        Route::get('/pembayaran/detail/{id}', [Controllers\Pembayaran\User\PembayaranUserController::class, 'riwayatDetail'])->name('pembayaranRiwayatDetail');
        Route::post('/pembayaran/bank', [Controllers\Pembayaran\User\PembayaranUserController::class, 'bank'])->name('pembayaranBank');
        
        Route::get('/produk/enroll/{id}', [Controllers\Produk\User\ProdukUserController::class, 'enroll'])->name('produkDetailEnroll');

        //RIWAYAT
        Route::get('/my/event', [Controllers\Event\User\EventUserController::class, 'riwayat'])->name('eventRiwayat');


        //Enroll
    });

});

//*Admin 
Route::get('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'index'])->name('loginAdmin');
Route::post('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'login'])->name('authAdmin');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [ Controllers\Home\Admin\AdminHomeController::class,'index'])->name('homeAdmin');

    //* TRANSAKSI
    Route::prefix('transaksi')->group(function(){
        Route::get('/', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'index'])->name('transaksiAdmin');
        Route::get('/detail', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'transaksi_detail'])->name('transaksiDetail');
        Route::get('/delete', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'transaksi_delete'])->name('transaksiDelete');
        Route::get('/delete-multi', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'transaksi_delete_multi'])->name('transaksiDeleteMulti');
        Route::get('/konfirm-bank', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'transaksi_konfirmasi_bank'])->name('transaksiBankKonfirmasi');
        Route::get('/tolak-bank', [Controllers\Pembayaran\Admin\PembayaranAdminController::class,'transaksi_tolak'])->name('transaksiTolak');
    });

    //* PENDAFTARAN
    Route::prefix('pendaftaran')->group(function(){

        //* EVENT
        Route::get('event', [Controllers\Event\Admin\EventPendaftaranController::class,'event'])->name('pendaftaranEvent');
        Route::get('event/delete', [Controllers\Event\Admin\EventPendaftaranController::class,'deleteEnrollEvent'])->name('deleteEnrollEvent');
        // Route::get('event/download', [Controllers\Event\Admin\EventPendaftaranController::class,'downloadEvent'])->name('downloadEvent');
    
    
    });

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

    Route::prefix('konsultan')->group(function(){
        Route::get('/', [ Controllers\Akun\Konsultan\KonsultanController::class,'index'])->name('konsultanAdmin');
        Route::get('edit/{id}', [Controllers\Akun\Konsultan\KonsultanController::class,'edit'])->name('konsultanAdminEdit');
        Route::get('detail/{id}', [Controllers\Akun\Konsultan\KonsultanController::class,'detail'])->name('konsultanAdminDetail');
        Route::post('/', [Controllers\Akun\Konsultan\KonsultanController::class,'store'])->name('konsultanAdminStore');
        Route::get('/add', [Controllers\Akun\Konsultan\KonsultanController::class,'create'])->name('konsultanAdminCreate');
        Route::get('reset-pass', [Controllers\Akun\Konsultan\KonsultanController::class,'resetPass'])->name('konsultanAdminReset');

        //LAYANAN
        Route::post('/layanan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'store'])->name('layananKonsultasiStore');
        Route::get('/layanan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'index'])->name('layananKonsultasiAdmin');
        Route::get('/layanan/add', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'add'])->name('layananKonsultasiAdminAdd');
        Route::get('/layanan/edit/{id}', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'edit'])->name('layananKonsultasiAdminEdit');
        
        Route::get('/layanan/konsultan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'showKonsultanLayanan'])->name('showKonsultanLayanan');
        Route::post('/layanan/konsultan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'addLayananKonsultan'])->name('addLayananKonsultan');
        Route::get('/layanan/konsultan/delete', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'deleteLayananKonsultan'])->name('deleteLayananKonsultan');

        //PENDIDIKAN
        Route::post('/pendidikan', [ Controllers\Akun\Konsultan\KonsultanController::class,'storePendidikan'])->name('storePendidikan');
        Route::get('/pendidikan', [ Controllers\Akun\Konsultan\KonsultanController::class,'getPendidikan'])->name('getPendidikan');
    
        //JADWAL
        Route::post('/jadwal', [Controllers\Konsultasi\Jadwal\Admin\JadwalAdminController::class,'addJadwalKonsultan'])->name('addJadwalKonsultan');
        Route::get('/jadwal/delete', [Controllers\Konsultasi\Jadwal\Admin\JadwalAdminController::class,'deleteJadwalKonsultan'])->name('deleteJadwalKonsultan');

    });

});