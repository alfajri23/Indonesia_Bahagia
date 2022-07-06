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


//* INFORMASI
Route::get('/terms-and-conditions', [ Controllers\Master\Informasi\InformasiController::class,'termCondition'])->name('termCondition');
Route::get('/about', [ Controllers\Master\Informasi\InformasiController::class,'about'])->name('about');
Route::get('/privacy-policy', [ Controllers\Master\Informasi\InformasiController::class,'privacy'])->name('privacy');


Route::prefix('forum')->group(function(){
    Route::get('/', [ Controllers\Forum\User\ForumUserController::class,'index'])->name('forum');
    
    Route::get('detail/{id}', [Controllers\Forum\User\ForumUserController::class,'detail'])->name('forumDetail');
    Route::get('detail-json', [ Controllers\Forum\User\ForumUserController::class,'show'])->name('forumDetailJson');
    Route::post('delete', [Controllers\Forum\User\ForumUserController::class,'delete'])->name('forumDelete');
    Route::get('show', [Controllers\Forum\User\ForumUserController::class,'show'])->name('forumDetailAjax');
    
    Route::get('komentar/detail', [Controllers\Forum\User\ForumUserController::class,'showKomentar'])->name('forumShowKomentar');
    Route::post('komentar/delete', [Controllers\Forum\User\ForumUserController::class,'deleteKomentar'])->name('forumDeleteKomentar');


});

Route::prefix('blog')->group(function(){

    Route::get('/', [ Controllers\Blog\User\BlogUserController::class,'index'])->name('blogUser');
    Route::get('/detail/{id}', [ Controllers\Blog\User\BlogUserController::class,'detail'])->name('blogDetailUser');
    Route::get('/filter', [ Controllers\Blog\User\BlogUserController::class,'filterByCategory'])->name('filterByCategory');

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

    //Route::group(['middleware' => ['verified']], function() {

        //* PROFILE
        Route::get('/profile', [ Controllers\Akun\User\UserController::class,'profile'])->name('profile');
        Route::get('/change-password', [ Controllers\Akun\User\UserController::class,'changePassword'])->name('changePassword');
        Route::post('/update-profile', [ Controllers\Akun\User\UserController::class,'update'])->name('profileUpdate');
        Route::post('/update-password', [ Controllers\Akun\User\UserController::class,'updatePassword'])->name('passwordUpdate');

        Route::get('/buat-janji', [Controllers\Konsultasi\User\KonsultasiUserController::class, 'buatJanji'])->name('buatJanji');
        Route::post('/buat-janji', [Controllers\Konsultasi\User\KonsultasiUserController::class, 'createJanji'])->name('createJanji');

        //Komentar Blog
        Route::post('/komentar/store', [ Controllers\Blog\User\BlogUserController::class,'storeKomentar'])->name('blogStoreKomentar');
        Route::post('/komentar/delete', [ Controllers\Blog\User\BlogUserController::class,'deleteKomentar'])->name('blogDeleteKomentar');

        //* PEMBAYARAN
        Route::get('/pembayaran/create/{id}/{janji?}', [Controllers\Pembayaran\User\PembayaranUserController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/riwayat-pembayaran', [Controllers\Pembayaran\User\PembayaranUserController::class, 'riwayat'])->name('pembayaranRiwayat');
        Route::get('/pembayaran/detail/{id}', [Controllers\Pembayaran\User\PembayaranUserController::class, 'riwayatDetail'])->name('pembayaranRiwayatDetail');
        Route::post('/pembayaran/bank', [Controllers\Pembayaran\User\PembayaranUserController::class, 'bank'])->name('pembayaranBank');
        
        Route::get('/produk/enroll/{id}', [Controllers\Produk\User\ProdukUserController::class, 'enroll'])->name('produkDetailEnroll');

        //*RIWAYAT
        Route::get('/my/event', [Controllers\Event\User\EventUserController::class, 'riwayat'])->name('eventRiwayat');
        Route::get('/my/konsultasi', [Controllers\Konsultasi\User\KonsultasiUserController::class, 'riwayat'])->name('konsultasiRiwayat');

        //* TESTIMONI
        Route::post('/testimoni/store', [ Controllers\Testimoni\User\TestimoniUserController::class,'store'])->name('testimoniStore');
    
        //* FORUM
        Route::post('/', [ Controllers\Forum\User\ForumUserController::class,'store'])->name('forumStore');
        //KATEGORI
        Route::post('forum/add-kategori', [Controllers\Forum\User\ForumUserController::class,'createKategori'])->name('forumStoreKategori');

        //KOMENTAR
        Route::post('komentar/jawaban', [Controllers\Forum\User\ForumUserController::class,'komentar'])->name('forumStoreKomentar');
    
    //});

});

//*Admin 
Route::get('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'index'])->name('loginAdmin');
Route::post('adm/login', [Controllers\Auth\Admin\LoginAdminController::class,'login'])->name('authAdmin');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [ Controllers\Home\Admin\AdminHomeController::class,'index'])->name('homeAdmin');

    Route::prefix('admin')->group(function(){
        Route::get('/', [ Controllers\Akun\Admin\AdminController::class,'index'])->name('adminAdmin');
        Route::get('/add', [Controllers\Akun\Admin\AdminController::class,'create'])->name('adminAdminCreate');
        Route::get('edit/{id}', [Controllers\Akun\Admin\AdminController::class,'edit'])->name('adminAdminEdit');
        Route::get('detail/{id}', [Controllers\Akun\Admin\AdminController::class,'detail'])->name('adminAdminDetail');
        Route::post('/', [Controllers\Akun\Admin\AdminController::class,'store'])->name('adminAdminStore');
        Route::get('reset-pass', [Controllers\Akun\Admin\AdminController::class,'resetPass'])->name('adminAdminReset');
        Route::get('delete/{id}', [Controllers\Akun\Admin\AdminController::class,'delete'])->name('adminAdminDelete');
    });

    Route::prefix('konsultan')->group(function(){
        Route::post('/', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'store'])->name('konsultanAdminStore');
        Route::get('/', [ Controllers\Akun\Konsultan\KonsultanAdminController::class,'index'])->name('konsultanAdmin');
        Route::get('edit/{id}', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'edit'])->name('konsultanAdminEdit');
        Route::get('detail/{id}', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'detail'])->name('konsultanAdminDetail');
        
        //DISINI KONSULTAN FUNCTION DULU
        Route::get('/add', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'create'])->name('konsultanAdminCreate');

    });

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
        

        //* KONSULTASI
        Route::get('konsultasi', [Controllers\Konsultasi\Pendaftaran\Admin\KonsultasiPendaftaranController::class,'konsultasi'])->name('pendaftaranKonsultasi');
        Route::get('konsultasi/detail', [Controllers\Konsultasi\Pendaftaran\Admin\KonsultasiPendaftaranController::class,'detail'])->name('pendaftaranKonsultasiDetail');
        Route::get('konsultasi/detail-transaksi', [Controllers\Konsultasi\Pendaftaran\Admin\KonsultasiPendaftaranController::class,'detail_transaksi'])->name('pendaftaranDetailTransaksi');
        Route::get('konsultasi/status-done', [Controllers\Konsultasi\Pendaftaran\Admin\KonsultasiPendaftaranController::class,'doneStatus'])->name('pendaftaranKonsultasiDoneStatus');
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

    Route::prefix('kelas')->group(function(){
        Route::get('/', [Controllers\Kelas\Admin\KelasAdminController::class,'index'])->name('kelasIndex');
        Route::get('/init', [Controllers\Kelas\Admin\KelasAdminController::class,'init'])->name('kelasInit');
        Route::get('/delete', [Controllers\Kelas\Admin\KelasAdminController::class,'delete'])->name('kelasDelete');
        Route::get('/detail/{id}', [Controllers\Kelas\Admin\KelasAdminController::class,'detail'])->name('kelasDetail');
        Route::post('/update', [Controllers\Kelas\Admin\KelasAdminController::class,'update'])->name('kelasUpdate');
    
        Route::prefix('bab')->group(function(){
            Route::post('/add', [Controllers\Kelas\Admin\KelasBabAdminController::class,'create'])->name('babCreate');
            Route::post('/edit', [Controllers\Kelas\Admin\KelasBabAdminController::class,'edit'])->name('babEdit');
            Route::get('/delete/{id}', [Controllers\Kelas\Admin\KelasBabAdminController::class,'delete'])->name('babDelete');
        });

        Route::prefix('materi')->group(function(){
            Route::get('/detail/{id}', [Controllers\Kelas\Admin\KelasMateriAdminController::class,'detail'])->name('materiDetail');
            Route::get('/create', [Controllers\Kelas\Admin\KelasMateriAdminController::class,'index'])->name('materiCreate');
            Route::get('/delete', [Controllers\Kelas\Admin\KelasMateriAdminController::class,'delete'])->name('materiDelete');
            Route::post('/store', [Controllers\Kelas\Admin\KelasMateriAdminController::class,'store'])->name('materiStore');
        });

        //kategories
        Route::get('/kategori', [Controllers\Kelas\Admin\KelasAdminController::class,'kelasKategori'])->name('kelasKategori');
        Route::post('/kategori/store', [Controllers\Kelas\Admin\KelasAdminController::class,'storeKelasKategori'])->name('storeKelasKategori');
        Route::get('/kategori/delete/{id}', [Controllers\Kelas\Admin\KelasAdminController::class,'deleteKelasKategori'])->name('deleteKelasKategori');
    
    });


    Route::prefix('testimoni')->group(function(){
        Route::get('/', [Controllers\Testimoni\Admin\TestimoniAdminController::class,'index'])->name('testimoniAdmin');
        Route::get('/aktif', [Controllers\Testimoni\Admin\TestimoniAdminController::class,'aktif'])->name('testimoniAdminAktif');
        Route::get('/nonaktif', [Controllers\Testimoni\Admin\TestimoniAdminController::class,'nonaktif'])->name('testimoniAdminNonaktif');
    });

});

//*Konsultan
Route::get('/konsultan/login', [Controllers\Auth\Konsultan\LoginKonsultanController::class,'index'])->name('loginKonsultan');
Route::post('/konsultan/login', [Controllers\Auth\Konsultan\LoginKonsultanController::class,'login'])->name('authKonsultan');


Route::middleware(['konsultan'])->prefix('konsultan')->group(function () {
    Route::get('/', [ Controllers\Home\Konsultan\KonsultanHomeController::class,'index'])->name('homeKonsultan');
    Route::post('/', [Controllers\Akun\Konsultan\KonsultanController::class,'store'])->name('konsultanStore');
    Route::get('/detail', [Controllers\Akun\Konsultan\KonsultanController::class,'detail'])->name('konsultanDetail');
    Route::get('/edit', [Controllers\Akun\Konsultan\KonsultanController::class,'edit'])->name('konsultanEdit');

    //* PENDAFTARAN
    Route::prefix('pendaftaran')->group(function(){
        Route::get('konsultasi', [Controllers\Konsultasi\Pendaftaran\Konsultan\KonsultasiPendaftaranController::class,'konsultasi'])->name('pendaftaranKonsultasiKonsultan');
        Route::get('konsultasi/detail', [Controllers\Konsultasi\Pendaftaran\Konsultan\KonsultasiPendaftaranController::class,'detail'])->name('pendaftaranKonsultasiDetailKonsultan');
        Route::get('konsultasi/detail-transaksi', [Controllers\Konsultasi\Pendaftaran\Konsultan\KonsultasiPendaftaranController::class,'detail_transaksi'])->name('pendaftaranDetailTransaksiKonsultan');
        Route::get('konsultasi/status-done', [Controllers\Konsultasi\Pendaftaran\Konsultan\KonsultasiPendaftaranController::class,'doneStatus'])->name('pendaftaranKonsultasiDoneStatusKonsultan');
    });


});


//ADMIN & KONSULTAN
Route::prefix('akun')->group(function () {
    Route::prefix('konsultan')->group(function () {
        
        Route::get('reset-pass', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'resetPass'])->name('konsultanAdminReset');
        Route::get('nonaktif', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'nonaktif'])->name('konsultanAdminNonaktif');
        Route::get('aktif', [Controllers\Akun\Konsultan\KonsultanAdminController::class,'aktif'])->name('konsultanAdminAktif');

        //LAYANAN
        Route::post('/layanan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'store'])->name('layananKonsultasiStore');
        Route::get('/layanan', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'index'])->name('layananKonsultasiAdmin');
        Route::get('/layanan/detail/{id}', [Controllers\Konsultasi\Layanan\Admin\LayananAdminController::class,'detail'])->name('layananKonsultasiDetailAdmin');
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

Route::prefix('double')->group(function(){
    Route::prefix('pendaftaran')->group(function(){

    });
});