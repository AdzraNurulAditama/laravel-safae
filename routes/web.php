<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuFavoritController;
use App\Http\Controllers\FullBacaanController;
use App\Http\Controllers\GenreUserController;
use App\Http\Controllers\GenreAdminController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminForumController;
use App\Http\Controllers\AdminRewardController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ReadingHistoryController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\BookSubmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminKomentarController;
use App\Http\Controllers\PembayaranAdminController;
use App\Http\Controllers\KelolaRiwayatBacaController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminBukuFavoritController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\BookResumeController;
  use App\Http\Controllers\PromotionController;
  use App\Http\Controllers\AdminPromotionController;

/*
|--------------------------------------------------------------------------
| AUTH PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| CONTACT & ABOUT
|--------------------------------------------------------------------------
*/
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-us', [AboutController::class, 'index'])->name('about.index');

/*
|--------------------------------------------------------------------------
| USER AREA (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/delete', [ProfileController::class, 'destroy'])
        ->name('profile.delete');

    /*
    |--------------------------------------------------------------------------
    | GENRE USER
    |--------------------------------------------------------------------------
    */
    Route::get('/genre', [GenreUserController::class, 'index'])
        ->name('genre.index');

    /*
    |--------------------------------------------------------------------------
    | BACA BUKU
    |--------------------------------------------------------------------------
    */
    Route::get('/buku/{id}/{page?}', [FullBacaanController::class, 'show'])
        ->name('book.show');

    Route::get('/full-bacaan/{id}', [FullBacaanController::class, 'show'])
        ->name('fullbacaan.show');

        /*
|--------------------------------------------------------------------------
| BOOK RESUME
|--------------------------------------------------------------------------
*/

    Route::get('/book/{book}/resume/create',
        [BookResumeController::class, 'create']
    )->name('resume.create');

    // Route untuk melihat daftar resume (yang sudah kamu punya)
    Route::get('/my-resumes', [BookResumeController::class, 'myResumes'])->name('resume.my');

    // --- PASTIKAN TIGA BARIS INI ADA DAN NAMANYA SESUAI ---
    // 1. Route untuk halaman edit
    Route::get('/bookresume/{id}/edit', [BookResumeController::class, 'edit'])->name('bookresume.edit');

    // 2. Route untuk memproses update data
    Route::put('/bookresume/{id}', [BookResumeController::class, 'update'])->name('bookresume.update');

    // 3. Route untuk memproses hapus data (Ini yang bikin error tadi)
    Route::delete('/bookresume/{id}', [BookResumeController::class, 'destroy'])->name('bookresume.destroy');
    // lihat detail
    Route::get('/bookresume/{id}', [BookResumeController::class, 'show'])->name('bookresume.show');
    /*
    |--------------------------------------------------------------------------
    | FAVORIT
    |--------------------------------------------------------------------------
    */
    Route::get('/buku-favorit', [BukuFavoritController::class, 'index'])
        ->name('favorite.index');

    Route::post('/buku-favorit/tambah', [BukuFavoritController::class, 'tambah'])
        ->name('favorite.tambah');

    Route::post('/buku-favorit/hapus', [BukuFavoritController::class, 'hapus'])
        ->name('favorite.hapus');

    /*
    |--------------------------------------------------------------------------
    | REWARD
    |--------------------------------------------------------------------------
    */
    Route::get('/reward', [RewardController::class, 'index'])
        ->name('reward.index');

    /*
    |--------------------------------------------------------------------------
    | PEMBAYARAN
    |--------------------------------------------------------------------------
    */
    Route::get('/pembayaran', [PembayaranController::class, 'index'])
        ->name('pembayaran.index');

    Route::post('/pembayaran/proses', [PembayaranController::class, 'proses'])
        ->name('pembayaran.proses');

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT BACA
    |--------------------------------------------------------------------------
    */
    Route::get('/riwayat-baca', [ReadingHistoryController::class, 'index'])
        ->name('reading.history');

    Route::delete('/riwayat-baca/{id}', [ReadingHistoryController::class, 'destroy'])
        ->name('reading.history.delete');

    /*
    |--------------------------------------------------------------------------
    | FORUM
    |--------------------------------------------------------------------------
    */
    Route::get('/forum', [ForumController::class, 'index'])
        ->name('forum.index');

    Route::get('/forum/{id}', [ForumController::class, 'detail'])
        ->name('forum.detail');

    Route::get('/forum/create/{genre_id}', [ForumController::class, 'create'])
        ->name('forum.create');

    Route::post('/forum/store', [ForumController::class, 'store'])
        ->name('forum.store');

    Route::post('/forum/comment', [ForumController::class, 'comment'])
        ->name('forum.comment');

    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])
        ->name('forum.edit');

    Route::post('/forum/{id}/update', [ForumController::class, 'update'])
        ->name('forum.update');

    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])
        ->name('forum.destroy');

    /*
    |--------------------------------------------------------------------------
    | KOMENTAR
    |--------------------------------------------------------------------------
    */
    Route::get('/buku/{bookId}/{page}/komentar', [KomentarController::class, 'index'])
        ->name('komentar.index');

    Route::post('/komentar/simpan', [KomentarController::class, 'simpan'])
        ->name('komentar.simpan');

    Route::get('/komentar/edit/{id}', [KomentarController::class, 'edit'])
        ->name('komentar.edit');

    Route::post('/komentar/update/{id}', [KomentarController::class, 'update'])
        ->name('komentar.update');

    Route::post('/komentar/hapus/{id}', [KomentarController::class, 'hapus'])
        ->name('komentar.hapus');

    /*
    |--------------------------------------------------------------------------
    | ULASAN
    |--------------------------------------------------------------------------
    */
    Route::get('/ulasan/{id}', [FullBacaanController::class, 'ulasan'])
        ->name('ulasan.index');

    Route::post('/ulasan/{id}', [FullBacaanController::class, 'storeReview'])
        ->name('ulasan.store');

    /*
    |--------------------------------------------------------------------------
    | TULIS BUKU
    |--------------------------------------------------------------------------
    */
    Route::get('/tulis-buku', [BookSubmissionController::class, 'create'])
        ->name('tulis-buku.create');

    Route::post('/tulis-buku/store', [BookSubmissionController::class, 'store'])
        ->name('tulis-buku.store');

    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI USER
    |--------------------------------------------------------------------------
    */
    Route::get('/notifikasi', [NotificationController::class, 'index'])
        ->name('notifikasi.index');

    Route::post('/notifikasi/read/{id}', [NotificationController::class, 'markAsRead'])
        ->name('notifikasi.read');

     /*
        |--------------------------------------------------------------------------
        | PROMOSI DI DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/promotions', [PromotionController::class, 'index'])
    ->name('promotions.index');

Route::get('/promotions/{id}', [PromotionController::class, 'show'])
    ->name('promotions.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminOnly::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */
        Route::get('/pembayaran', [PembayaranAdminController::class, 'index'])
            ->name('pembayaran.index');

/*
        |--------------------------------------------------------------------------
        | RIWAYAT BACA (SUDAH DI-FIX JALURNYA)
        |--------------------------------------------------------------------------
        */
 /*
        |--------------------------------------------------------------------------
        | RIWAYAT BACA ADMIN (DIPINDAHKAN KE CONTROLLER ADMIN YANG BENAR)
        |--------------------------------------------------------------------------
        */
        Route::prefix('riwayat-baca')->name('kelolariwayat.')->group(function () {
            Route::get('/', [KelolaRiwayatBacaController::class, 'index'])->name('index');
            Route::get('/create', [KelolaRiwayatBacaController::class, 'create'])->name('create');
            Route::post('/', [KelolaRiwayatBacaController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [KelolaRiwayatBacaController::class, 'edit'])->name('edit');
            Route::post('/{id}', [KelolaRiwayatBacaController::class, 'update'])->name('update');
            Route::delete('/{id}', [KelolaRiwayatBacaController::class, 'destroy'])->name('destroy');
        });
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Route::resource('/users', UserController::class);

/*
        |--------------------------------------------------------------------------
        | REVIEWS
        |--------------------------------------------------------------------------
        */
        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('reviews.index');

        // TAMBAHKAN BARIS INI:
        Route::get('/reviews/{id}', [AdminReviewController::class, 'show'])
            ->name('reviews.show');

        Route::delete('/reviews/{id}', [AdminReviewController::class, 'destroy'])
            ->name('reviews.destroy');

        /*
        |--------------------------------------------------------------------------
        | FORUM
        |--------------------------------------------------------------------------
        */
        Route::get('/forum', [AdminForumController::class, 'index'])->name('forum.index');
        Route::get('/forum/{id}', [AdminForumController::class, 'detail'])->name('forum.detail');
        Route::delete('/forum/{id}', [AdminForumController::class, 'destroy'])->name('forum.destroy');
        /*
        |--------------------------------------------------------------------------
        | GENRE & BUKU
        |--------------------------------------------------------------------------
        */
        Route::get('/genre', [GenreAdminController::class, 'daftarBuku'])
            ->name('genre.index');

        Route::get('/books/create', [GenreAdminController::class, 'halamanTambah'])
            ->name('books.create');

        Route::post('/books/store', [GenreAdminController::class, 'simpanBuku'])
            ->name('books.store');

        // SHOW DETAIL BUKU
        Route::get('/books/{id}', [GenreAdminController::class, 'show'])
            ->name('books.show');

        // EDIT
        Route::get('/books/{id}/edit', [GenreAdminController::class, 'halamanEdit'])
            ->name('books.edit');

        // UPDATE
        Route::post('/books/{id}/update', [GenreAdminController::class, 'perbaruiBuku'])
            ->name('books.update');

        // DELETE
        Route::post('/books/delete', [GenreAdminController::class, 'hapusBuku'])
            ->name('books.delete');

        /*
        |--------------------------------------------------------------------------
        | VALIDASI BUKU
        |--------------------------------------------------------------------------
        */
        Route::get('/validasi', [BookSubmissionController::class, 'indexAdmin'])
            ->name('validasi.index');

        Route::post('/validasi/{id}/approve', [BookSubmissionController::class, 'approve'])
            ->name('validasi.approve');

        Route::post('/validasi/{id}/reject', [BookSubmissionController::class, 'reject'])
            ->name('validasi.reject');

        /*
        |--------------------------------------------------------------------------
        | KOMENTAR
        |--------------------------------------------------------------------------
        */
        Route::get('/komentar', [AdminKomentarController::class, 'index'])
            ->name('komentar.index');

        Route::delete('/komentar/{id}', [AdminKomentarController::class, 'hapus'])
            ->name('komentar.hapus');

        /*
        |--------------------------------------------------------------------------
        | REWARDS
        |--------------------------------------------------------------------------
        */
        Route::get('/rewards', [AdminRewardController::class, 'index'])
            ->name('rewards.index');

        Route::post('/rewards/{user}/add', [AdminRewardController::class, 'add'])
            ->name('reward.add');

        Route::post('/rewards/{user}/remove', [AdminRewardController::class, 'remove'])
            ->name('reward.remove');

        /*
        |--------------------------------------------------------------------------
        | FAVORIT
        |--------------------------------------------------------------------------
        */
        Route::get('/favorit', [AdminBukuFavoritController::class, 'index'])
            ->name('favorit.index');

        Route::get('/favorit/{id}', [AdminBukuFavoritController::class, 'show'])
            ->name('favorit.show');

        Route::delete('/favorit/{id}', [AdminBukuFavoritController::class, 'destroy'])
            ->name('favorit.destroy');

        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS
        |--------------------------------------------------------------------------
        */
        Route::get('/notifications', [AdminNotificationController::class, 'index'])
            ->name('notifications.index');

        Route::post('/notifications/{id}/read', [AdminNotificationController::class, 'markAsRead'])
            ->name('notifications.read');

        Route::delete('/notifications/{id}', [AdminNotificationController::class, 'destroy'])
            ->name('notifications.destroy');

        /*
|--------------------------------------------------------------------------
| KELOLA PROMOSI
|--------------------------------------------------------------------------
*/

Route::get('/promotions', [AdminPromotionController::class, 'index'])
    ->name('promotions.index');

Route::get('/promotions/create', [AdminPromotionController::class, 'create'])
    ->name('promotions.create');

Route::post('/promotions/store', [AdminPromotionController::class, 'store'])
    ->name('promotions.store');

Route::get('/promotions/{id}/edit', [AdminPromotionController::class, 'edit'])
    ->name('promotions.edit');

Route::post('/promotions/{id}/update', [AdminPromotionController::class, 'update'])
    ->name('promotions.update');

Route::delete('/promotions/{id}', [AdminPromotionController::class, 'destroy'])
    ->name('promotions.destroy');
    });

/*
|--------------------------------------------------------------------------
| IMAGE PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/image/{path}', function ($path) {

    $fullPath = storage_path('app/public/' . $path);

    if (!File::exists($fullPath)) {
        abort(404);
    }

    return response()->file($fullPath, [
        'Access-Control-Allow-Origin'  => '*',
        'Access-Control-Allow-Methods' => 'GET, OPTIONS',
        'Access-Control-Allow-Headers' => '*',
    ]);

})->where('path', '.*');