<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceRecordController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::delete('/employee/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');


    Route::get('/service_record', [ServiceRecordController::class, 'index'])->name('service_record.index');
    Route::get('/service_record/create', [ServiceRecordController::class, 'create'])->name('service_record.create');
    Route::post('/service_record/store', [ServiceRecordController::class, 'store'])->name('service_record.store');
    Route::delete('/service_record/destroy/{service_record}', [ServiceRecordController::class, 'destroy'])->name('service_record.destroy');
    Route::get('/service_record/edit/{service_record}', [ServiceRecordController::class, 'edit'])->name('service_record.edit');
    Route::put('/service_record/update/{service_record}', [ServiceRecordController::class, 'update'])->name('service_record.update');

    Route::resource('service_record', ServiceRecordController::class);


    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('/', function () {
    //     return Inertia::render('Auth/Login');
    // });
});

require __DIR__ . '/auth.php';
