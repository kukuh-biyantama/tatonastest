<?php

/// routes/web.php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Make sure to import the correct namespace for the controller.

Route::get('/', function () {
    return view('welcome');
});

// Your other routes...

// Include the auth.php file to handle authentication routes
require __DIR__ . '/auth.php';

// Protected routes for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes for 'superadmin' role
    Route::middleware(['auth', 'verified', 'superadmin'])->group(function () {
        // Routes that are accessible only by 'superadmin' users
        Route::get('/superadmins', [SuperAdminController::class, 'indexmastersensor'])->name('superadmin.test');
        Route::get('/superadmins-edit/{sensor}', [SuperAdminController::class, 'edit'])->name('superadmins-edit.edit');
        Route::put('/master-sensors/{sensor}',  [SuperAdminController::class, 'update'])->name('master-sensors.update');
        Route::delete('/superadmins-delete/{sensor}', [SuperAdminController::class, 'destroy'])->name('superadmins-delete.destroy');
        Route::post('/mastersensor/store', [SuperAdminController::class, 'store'])->name('mastersensor.store');

        //hardware
        Route::get('/superadminshardware-edit/{hardware}', [SuperAdminController::class, 'edithardware'])->name('superadminshardware-edit.edit');
        Route::delete('/superadminshardware-delete/{hardware}', [SuperAdminController::class, 'destroyhardware'])->name('superadminshardware-delete.destroyhardware');
        Route::put('/hardware/update/{hardware}', [SuperAdminController::class, 'updatehardware'])->name('hardware.update');
        Route::post('/hardware/store', [SuperAdminController::class, 'storehardware'])->name('hardware.store');

        //hardware details
        Route::delete('/superadminshardwaredetails-delete/{id}', [SuperAdminController::class, 'destroyhardwaredetails'])->name('superadminshardwaredetails-delete.destroyhardwaredetails');
    });

    // Routes for 'admin' role
    Route::middleware(['auth', 'verified', 'admin'])->group(function () {
        Route::get('/superadmins', [AdminController::class, 'indexmastersensor'])->name('admin.test');
        Route::get('/superadmins-edit/{sensor}', [AdminController::class, 'edit'])->name('superadmins-edit.edit');
        Route::put('/master-sensors/{sensor}',  [AdminController::class, 'update'])->name('master-sensors.update');
        Route::delete('/superadmins-delete/{sensor}', [AdminController::class, 'destroy'])->name('superadmins-delete.destroy');
        Route::post('/mastersensor/store', [AdminController::class, 'store'])->name('mastersensor.store');

        //hardware
        Route::get('/superadminshardware-edit/{hardware}', [AdminController::class, 'edithardware'])->name('superadminshardware-edit.edit');
        Route::delete('/superadminshardware-delete/{hardware}', [AdminController::class, 'destroyhardware'])->name('superadminshardware-delete.destroyhardware');
        Route::put('/hardware/update/{hardware}', [AdminController::class, 'updatehardware'])->name('hardware.update');
        Route::post('/hardware/store', [AdminController::class, 'storehardware'])->name('hardware.store');

        //hardware details
        Route::delete('/superadminshardwaredetails-delete/{id}', [AdminController::class, 'destroyhardwaredetails'])->name('superadminshardwaredetails-delete.destroyhardwaredetails');
    });

    Route::middleware(['auth', 'verified', 'user'])->group(function () {
        // Route::get('/user', [UserController::class, 'indexmastersensor'])->name('user.test');
        // Route::get('/user-edit/{sensor}', [UserController::class, 'edit'])->name('user-edit.edit');
        // Route::put('/user/{sensor}',  [UserController::class, 'update'])->name('user.update');
        // Route::delete('/user/{sensor}', [UserController::class, 'destroy'])->name('user-delete.destroy');
        // Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

        // //hardware
        // Route::get('/user-edit/{hardware}', [UserController::class, 'edithardware'])->name('user-edit.edit');
        // Route::delete('/user-delete/{hardware}', [UserController::class, 'destroyhardware'])->name('user-delete.destroyhardware');
        // Route::put('/hardware/update/{hardware}', [UserController::class, 'updatehardware'])->name('hardware.update');
        // Route::post('/hardware/store', [UserController::class, 'storehardware'])->name('hardware.store');

        // //hardware details
        // Route::delete('/superadminshardwaredetails-delete/{id}', [UserController::class, 'destroyhardwaredetails'])->name('user-delete.destroyhardwaredetails');
    });
});
