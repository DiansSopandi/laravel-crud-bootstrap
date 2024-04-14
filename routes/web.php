<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});
Route::get('/login', function () {
    return view('login.index');
});

// Route::get('/employees', function()  {
//     return view('employees.index');
// });

// Route::get('/employees/create', 'EmployeeController@create');
// Route::post('/employees', 'EmployeeController@store');

// Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
// Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/index', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('/employees/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');
Route::post('/employees', [EmployeeController::class, 'store']);
Route::put('/employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

