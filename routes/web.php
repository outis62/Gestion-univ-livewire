<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\CommercialisationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailCollecteController;
use App\Http\Controllers\InstitutFinancementPartenaireController;
use App\Http\Controllers\ModeAcquisitionController;
use App\Http\Controllers\MoyenStockageController;
use App\Http\Controllers\OperationPaysaneController;
use App\Http\Controllers\SpeculationController;
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
    return view('front-office.pages.dashboard');
});
Route::get('/', function () {
    return view('web-site.pages.home');
});
Route::middleware('auth')->group(function () {
    Route::middleware('isAccess:handler-admin,agent-admin')->group(function () {
        Route::prefix('admins')->group(function () {
            Route::get('/dashboard', [UserController::class, 'index'])->name('admins.dashboard'); //adminDashboard
            Route::resource('/users', AdminController::class, [
                'names' => array(
                    'index' => 'admins.users.index',
                    'create' => 'admins.users.create',
                    'show' => 'admins.users.show',
                    'edit' => 'admins.users.edit',
                    'destroy' => 'admins.users.destroy',
                ),
                'except' => ['store', 'update'],
            ]);
            Route::resource('/utilisateurs', AccountController::class, [
                'names' => array(
                    'edit' => 'admins.utilisateurs.edit',
                    'show' => 'admins.utilisateurs.show',
                    'update' => 'admins.utilisateurs.update',
                ),
                'except' => ['index', 'create', 'destroy', 'store'],
            ]);
        });
    });
});
require __DIR__ . '/auth.php';
