<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;

require __DIR__.'/auth.php';

/*Register */
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


/*profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*main pages */
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/admin', function () {
    return view('admin\panel');
});
Route::get('/customer', function () {
    return view('customer\main');
});
Route::get('/mechanic', function () {
    return view('mechanic\main');
});



Route::prefix('admin')->name('admin.')->group(function () {

    // داشبورد
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // مدیریت کاربران
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');           // لیست کاربران
        Route::get('/create', [UserController::class, 'create'])->name('create');   // فرم ایجاد کاربر جدید
        Route::post('/', [UserController::class, 'store'])->name('store');          // ذخیره کاربر جدید
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');  // فرم ویرایش کاربر
        Route::put('/{user}', [UserController::class, 'update'])->name('update');   // بروزرسانی کاربر
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy'); // حذف کاربر
        Route::post('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status'); // فعال/غیرفعال کردن کاربر
    });

    // مدیریت تیکت‌ها
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');           // لیست تیکت‌ها
        Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');    // مشاهده جزئیات تیکت
        Route::post('/{ticket}/reply', [TicketController::class, 'reply'])->name('reply');  // ارسال پاسخ تیکت
        Route::put('/{ticket}/status', [TicketController::class, 'updateStatus'])->name('update-status'); // تغییر وضعیت تیکت
        Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy'); // حذف تیکت
    });

});
