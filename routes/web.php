<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerPanel\CustomerPanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MechanicPanel\MechanicPanelController;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/auth.php';

/*Register & login */
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
/*profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*main pages */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'servicesList'])->name('services.list');
Route::get('/repairmen', [HomeController::class, 'repairmenList'])->name('repairmen.list');
Route::get('/repairmen/{id}', [HomeController::class, 'showRepairmanProfile'])->name('repairmen.profile');
Route::get('/services/{service}', [HomeController::class, 'serviceDetail'])->name('services.detail');


Route::prefix('admin')
->name('admin.')
->middleware(['auth', 'admin'])
->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/create', [UserController::class, 'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
            Route::post('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status');
        });

        Route::prefix('tickets')->name('tickets.')->group(function () {
            Route::get('/', [TicketController::class, 'index'])->name('index');
            Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
            Route::post('/{ticket}/reply', [TicketController::class, 'reply'])->name('reply');
            Route::put('/{ticket}/status', [TicketController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
        });
});


Route::prefix('customerpanel')
    ->name('customerpanel.')
    ->middleware(['auth', 'customer'])
    ->group(function () {
        Route::get('/dashboard', [CustomerPanelController::class, 'index'])->name('dashboard');
        Route::get('/appointment/request', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/appointment/submit', [AppointmentController::class, 'store'])->name('appointment.submit');
        Route::delete('/appointment/cancel', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
        Route::get('/appointments/history', [AppointmentController::class, 'history'])->name('appointments.history');
        Route::get('/appointment/status', [AppointmentController::class, 'status'])->name('appointment.status');
    });



Route::prefix('mechanicpanel')
    ->name('mechanicpanel.')
    ->middleware(['auth', 'mechanic'])
    ->group(function () {
        Route::get('/dashboard', [MechanicPanelController::class, 'index'])->name('dashboard');
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
        Route::post('/appointment/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('appointment.updateStatus');
        Route::post('/appointment/{id}/start', [AppointmentController::class, 'startWork'])->name('appointment.startWork');
        Route::post('/appointment/{id}/finish', [AppointmentController::class, 'finishWork'])->name('appointment.finishWork');
        Route::get('/work-history', [AppointmentController::class, 'workHistory'])->name('workHistory');
    });
