<?php

use App\Http\Controllers\adminControllers\adminController;
use App\Http\Controllers\phoneBaseControllers\createController;
use App\Http\Controllers\phoneBaseControllers\destroyController;
use App\Http\Controllers\phoneBaseControllers\editController;
use App\Http\Controllers\phoneBaseControllers\indexController;
use App\Http\Controllers\phoneBaseControllers\showController;
use App\Http\Controllers\phoneBaseControllers\storeController;
use App\Http\Controllers\phoneBaseControllers\updateController;
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
Auth::routes();
//роут авторизации
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//роут к выводу всех записей в БД с функцией индекс (забор с контроллера) с именем по конвенции ларавел
Route::get('/home', [indexController::class, 'index'])->middleware('admin')->name('phoneBaseViews.index');
//роут к админ панели
Route::get('/admin', [adminController::class, '__invoke'])->name('layouts.admin');
//роут к созданию записи в БД с функцией create и именем по конвенции
Route::get('/phones/create', [createController::class, 'create'])->name('phoneBaseViews.create');
//роут, куда придут данные с формы create с именем по конвенции ларавел
Route::post('/phones', [storeController::class, 'store'])->name('phoneBaseViews.store');
//роут отображения всех телефонов из БД
Route::get('/phones/{phone}', [showController::class, 'show'])->name('phoneBaseViews.show');
//роут редактирования записи в БД (страница редактирования)
Route::get('/phones/{phone}/edit', [editController::class, 'edit'])->name('phoneBaseViews.edit');
//роут изменения записи БД
Route::patch('/phones/{phone}', [updateController::class, 'update'])->name('phoneBaseViews.update');
//роут удаления удаления записи БД
Route::delete('/phones/{phone}', [destroyController::class, 'destroy'])->name('phoneBaseViews.delete');
