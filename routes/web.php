<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin.index');

Route::get('/roles',[RolesController::class,'index'])->middleware(['auth', 'role:admin'])->name('admin.roles.index');
Route::get('/roles.create',[RolesController::class,'create'])->middleware(['auth', 'role:admin'])->name('admin.roles.create');
Route::post('/roles.store',[RolesController::class,'store'])->middleware(['auth', 'role:admin'])->name('admin.roles.store');
Route::get('/roles.edit/{id}',[RolesController::class,'edit'])->middleware(['auth', 'role:admin'])->name('admin.roles.edit');
Route::put('/roles.update/{id}',[RolesController::class,'update'])->middleware(['auth', 'role:admin'])->name('admin.roles.update');
Route::get('/roles.destroy/{id}',[RolesController::class,'destroy'])->middleware(['auth', 'role:admin'])->name('admin.roles.destroy');

//These routes are for the Permission section while they will also include some more routes which will be utilized for the Roles&P

Route::get('/permissions',[PermissionsController::class,'index'])->middleware(['auth', 'role:admin'])->name('admin.permissions.index');
Route::get('/permissions.create',[PermissionsController::class,'create'])->middleware(['auth', 'role:admin'])->name('admin.permissions.create');
Route::post('/permissions.create',[PermissionsController::class,'store'])->middleware(['auth', 'role:admin'])->name('admin.permissions.store');
Route::get('/permissions.edit/{id}',[PermissionsController::class,'edit'])->middleware(['auth', 'role:admin'])->name('admin.permissions.edit');
Route::put('/permissions.update/{id}',[PermissionsController::class,'update'])->middleware(['auth', 'role:admin'])->name('admin.permissions.update');
Route::get('/permissions.destroy/{id}',[PermissionsController::class,'destroy'])->middleware(['auth', 'role:admin'])->name('admin.permissions.destroy');

// Route::resource('/test','TestController');

// Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function()
// {

//     Route::get('/',[IndexController::class,'index'])->name('index');
//     Route::resource('/roles',[RoleController::class]);
//     Route::resource('/permissions',[PermissionController::class]);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
