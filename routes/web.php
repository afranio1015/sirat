<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkingHourController;
use App\Http\Controllers\RecordController;
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
//Rotas das unidades
Route::middleware(['auth'])->group(function(){
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home_op', [HomeController::class, 'index2'])->name('home_op');

Route::get('/department/new', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/department/create_action', [DepartmentController::class, 'create_action'])->name('dpto.create_action');
Route::get('/department/edit', [DepartmentController::class, 'edit'])->name('dpto.edit');
Route::post('/department/edit_action', [DepartmentController::class, 'edit_action'])->name('dpto.edit_action');
Route::get('/department/delete', [DepartmentController::class, 'delete'])->name('dpto.delete');

//rotas da Categoria das atividades
Route::get('/category/new', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create_action', [CategoryController::class, 'create_action'])->name('cat.create_action');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('cat.edit');
Route::post('/category/edit_action', [CategoryController::class, 'edit_action'])->name('cat.edit_action');
Route::get('/category/delete', [CategoryController::class, 'delete'])->name('cat.delete');

//Rotas das atividades/tarefas
Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/create_action', [TaskController::class, 'create_action'])->name('task.create_action');
Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/edit_action', [TaskController::class, 'edit_action'])->name('task.edit_action');
Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');

//Rotas do do usuário
Route::get('/user/new', [AuthController::class, 'create'])->name('user.create');
Route::post('/user/create_action', [AuthController::class, 'create_action'])->name('user.create_action');
Route::get('/user/edit', [AuthController::class, 'edit'])->name('user.edit');
Route::post('/user/edit_action', [AuthController::class, 'edit_action'])->name('user.edit_action');
Route::get('/user/delete', [AuthController::class, 'delete'])->name('user.delete');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Rotas do Expediente
Route::get('/working_hour/new', [WorkingHourController::class, 'create'])->name('working_hour.create');
Route::post('/working_hour/create_action', [WorkingHourController::class, 'create_action'])->name('working_hour.create_action');
Route::get('/working_hour/edit', [WorkingHourController::class, 'edit'])->name('working_hour.edit');
// Route::post('/working_hour/edit_action', [WorkingHourController::class, 'edit_action'])->name('working_hour.edit_action');
Route::get('/working_hour/delete', [WorkingHourController::class, 'delete'])->name('working_hour.delete');

//Rotas para registrar atividades
Route::get('/record/new', [RecordController::class, 'create'])->name('record.create');
Route::post('/record/create_action', [RecordController::class, 'create_action'])->name('record.create_action');
Route::get('/record/edit', [RecordController::class, 'edit'])->name('record.edit');
Route::post('/record/edit_action', [RecordController::class, 'edit_action'])->name('record.edit_action');
Route::get('/record/delete', [RecordController::class, 'delete'])->name('record.delete');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login_action'])->name('user.login_action');

// Route::get('/', function () {
//     return view('welcome');
// });
