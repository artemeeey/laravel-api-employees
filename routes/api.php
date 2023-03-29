<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('employees')->group(function () {
    Route::post('/', [EmployeesController::class, 'create'])->name('employees.create');
    Route::get('/{id}', [EmployeesController::class, 'get'])->name('employees.get');
    Route::get('/', [EmployeesController::class, 'all'])->name('employees.all');
    Route::patch('/{id}', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::patch('/image/{id}', [EmployeesController::class, 'upload'])->name('employees.upload');;
});

