<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to('/auth/login');
    return view('welcome');
});

Route::prefix('auth')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logoutWebsite']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/locked-account', [AuthController::class, 'lockedAccount']);
});

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'showDashboard']);
});

Route::prefix('management')->group(function() {
    Route::prefix('user')->group(function() {
        Route::get('/create', [UserController::class, 'showCreate']);
        Route::get('/update/{id}', [UserController::class, 'showUpdate']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'create']);
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::delete('/', [UserController::class, 'delete']);
    });
    Route::prefix('role')->group(function() {
        Route::get('/create', [RoleController::class, 'showCreate']);
        Route::get('/update', [RoleController::class, 'showUpdate']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'create']);
        Route::patch('/', [RoleController::class, 'update']);
        Route::delete('/', [RoleController::class, 'delete']);
    });
    Route::prefix('menu')->group(function() {
        Route::get('/create', [MenuController::class, 'showCreate']);
        Route::get('/update/{id}', [MenuController::class, 'showUpdate']);
        Route::post('/update/{id}', [MenuController::class, 'update']);
        Route::get('/{id}', [MenuController::class, 'show']);
        Route::patch('/{id}', [MenuController::class, 'update']);
        Route::get('/', [MenuController::class, 'index']);
        Route::post('/', [MenuController::class, 'create']);
        Route::delete('/', [MenuController::class, 'delete']);
    });
    Route::prefix('event')->group(function() {

    });
});

Route::prefix('company')->group(function() {
    Route::prefix('employee')->group(function() {
        Route::get('/create', [EmployeeController::class, 'showCreate']);
        Route::get('/update/{id}', [EmployeeController::class, 'showUpdate']);
        Route::post('/update/{id}', [EmployeeController::class, 'update']);
        Route::get('/{id}', [EmployeeController::class, 'show']);
        Route::get('/', [EmployeeController::class, 'index']);
        Route::post('/', [EmployeeController::class, 'create']);
        Route::delete('/', [EmployeeController::class, 'delete']);
    });
});

Route::prefix('ticket')->group(function() {
    Route::prefix('delegation')->group(function() {
        Route::get('/create', [RoleController::class, 'showCreate']);
        Route::get('/update', [RoleController::class, 'showUpdate']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'create']);
        Route::patch('/', [RoleController::class, 'update']);
        Route::delete('/', [RoleController::class, 'delete']);
    });
});