<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;

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



/*admin panel */
Route::prefix('admin/panel')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('admin/appointments', [AdminController::class, 'appointments'])->name('appointments');
    Route::get('admin/tickets', [AdminController::class, 'tickets'])->name('tickets');
    Route::get('admin/vehicles', [AdminController::class, 'vehicles'])->name('vehicles');
    Route::get('admin/mechanics', [AdminController::class, 'mechanics'])->name('mechanics');
    Route::get('admin/customers', [AdminController::class, 'customers'])->name('customers');
});
