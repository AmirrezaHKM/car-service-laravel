<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TicketController as TicketAdminController ;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Appointment\Customer\CustomerAppointmentController;
use App\Http\Controllers\Appointment\Repairman\RepairmanAppointmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerPanel\CustomerPanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MechanicPanel\MechanicPanelController;
use App\Http\Controllers\services\ServiceController;
use App\Http\Controllers\Tickets\Customer\TicketCustomerController;
use App\Http\Controllers\Tickets\Mechanic\TicketMechanicController;
use App\Http\Controllers\Vehicles\VehiclesController;
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
            Route::get('/', [TicketAdminController::class, 'index'])->name('index');
            Route::get('/{ticket}', [TicketAdminController::class, 'show'])->name('show');
            Route::post('/{ticket}/reply', [TicketAdminController::class, 'reply'])->name('reply');
            Route::put('/{ticket}/status', [TicketAdminController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{ticket}', [TicketAdminController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('store');
            Route::get('/{service}/edit', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('edit');
            Route::put('/{service}', [\App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('update');
            Route::delete('/{service}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('destroy');
        });
        
});


Route::prefix('customerpanel')
    ->name('customerpanel.')
    ->middleware(['auth', 'customer'])
    ->group(function () {

        Route::get('/dashboard', [CustomerPanelController::class, 'index'])->name('dashboard');

        Route::prefix('vehicles')->name('vehicles.')->group(function () {
            Route::get('/', [VehiclesController::class, 'index'])->name('index');
            Route::get('/create', [VehiclesController::class, 'create'])->name('create');
            Route::post('/', [VehiclesController::class, 'store'])->name('store');
            Route::get('/{vehicle}/edit', [VehiclesController::class, 'edit'])->name('edit');
            Route::put('/{vehicle}', [VehiclesController::class, 'update'])->name('update');
            Route::delete('/{vehicle}', [VehiclesController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/', [CustomerAppointmentController::class, 'index'])->name('index');
            Route::get('/{appointment}', [CustomerAppointmentController ::class, 'show'])->name('show');
            Route::get('/create', [CustomerAppointmentController::class, 'create'])->name('create');
            Route::post('/', [CustomerAppointmentController::class, 'store'])->name('store');
            Route::get('/{appointment}/edit', [CustomerAppointmentController::class, 'edit'])->name('edit');
            Route::put('/{appointment}', [CustomerAppointmentController::class, 'update'])->name('update');
            Route::delete('/{appointment}', [CustomerAppointmentController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('tickets')->name('tickets.')->group(function () {
            Route::get('/', [TicketCustomerController ::class, 'index'])->name('index');
            Route::post('/', [TicketCustomerController::class, 'store'])->name('store');
            Route::get('/create', [TicketCustomerController::class, 'create'])->name('create');
            Route::get('/{ticket}', [TicketCustomerController ::class, 'show'])->name('show');
            Route::post('/{ticket}/message', [TicketCustomerController ::class, 'message'])->name('message');
            Route::put('/{ticket}/status', [TicketCustomerController ::class, 'updateStatus'])->name('update-status');
            Route::delete('/{ticket}', [TicketCustomerController ::class, 'destroy'])->name('destroy');
        });
    });


    Route::prefix('mechanicpanel')
    ->name('mechanicpanel.')
    ->middleware(['auth', 'mechanic'])
    ->group(function () {

        Route::get('/dashboard', [MechanicPanelController::class, 'index'])->name('dashboard');

        Route::prefix('services')->name('services.')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/', [ServiceController::class, 'store'])->name('store');
            Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
            Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/', [RepairmanAppointmentController::class, 'index'])->name('index');
            Route::get('/{appointment}', [RepairmanAppointmentController::class, 'show'])->name('show');
            Route::get('/{appointment}/edit', [RepairmanAppointmentController::class, 'edit'])->name('edit');
            Route::put('/{appointment}', [RepairmanAppointmentController::class, 'update'])->name('update');
            Route::delete('/{appointment}', [RepairmanAppointmentController::class, 'destroy'])->name('destroy');

            Route::get('/{appointment}/checklist', [RepairmanAppointmentController::class, 'showChecklistForm'])->name('checklist.form');
            Route::post('/{appointment}/checklist', [RepairmanAppointmentController::class, 'storeChecklist'])->name('checklist.store');
            Route::put('/{appointment}/checklist', [RepairmanAppointmentController::class, 'updateChecklist'])->name('checklist.update');
            Route::delete('/{appointment}/checklist', [RepairmanAppointmentController::class, 'deleteChecklist'])->name('checklist.delete');

            Route::get('/{appointment}/service_report', [RepairmanAppointmentController::class, 'showServiceReportForm'])->name('service_report.form');
            Route::post('/{appointment}/service_report', [RepairmanAppointmentController::class, 'storeServiceReport'])->name('service_report.store');
            Route::put('/{appointment}/service_report', [RepairmanAppointmentController::class, 'updateServiceReport'])->name('service_report.update');
            Route::delete('/{appointment}/service_report', [RepairmanAppointmentController::class, 'deleteServiceReport'])->name('service_report.delete');
        });

        Route::prefix('tickets')->name('tickets.')->group(function () {
            Route::get('/', [TicketMechanicController::class, 'index'])->name('index');
            Route::post('/', [TicketMechanicController::class, 'store'])->name('store');
            Route::get('/create', [TicketMechanicController::class, 'create'])->name('create');
            Route::get('/{ticket}', [TicketMechanicController::class, 'show'])->name('show');
            Route::post('/{ticket}/message', [TicketMechanicController::class, 'message'])->name('message');
            Route::put('/{ticket}/status', [TicketMechanicController::class, 'updateStatus'])->name('update-status');
            Route::delete('/{ticket}', [TicketMechanicController::class, 'destroy'])->name('destroy');
        });
    });


