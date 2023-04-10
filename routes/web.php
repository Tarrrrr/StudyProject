<?php

use App\Http\Controllers\PhoneBaseControllers\IndexController;
use App\Http\Controllers\PhoneBaseControllers\CreateController;
use App\Http\Controllers\PhoneBaseControllers\StoreController;
use App\Http\Controllers\PhoneBaseControllers\ShowController;
use App\Http\Controllers\PhoneBaseControllers\UpdateController;
use App\Http\Controllers\PhoneBaseControllers\EditController;
use App\Http\Controllers\PhoneBaseControllers\DestroyController;
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
    //роут к выводу всех записей в БД с функцией индекс (забор с контроллера) с именем по конвенции ларавел
    Route::get('/phones', [IndexController::class, 'index'])->name('phones.index');
    //роут к созданию записи в БД с функцией create и именем по конвенции
    Route::get('/phones/create', [CreateController::class, 'create'])->name('phones.create');
    //роут, куда придут данные с формы create с именем по конвенции ларавел
    Route::post('/phones', [StoreController::class, 'store'])->name('phones.store');
    //роут отображения всех телефонов из БД
    Route::get('/phones/{phone}', [ShowController::class, 'show'])->name('phones.show');
    //роут редактирования записи в БД (страница редактирования)
    Route::get('/phones/{phone}/edit', [EditController::class, 'edit'])->name('phones.edit');
    //роут изменения записи БД
    Route::patch('/phones/{phone}', [UpdateController::class, 'update'])->name('phones.update');
    //роут удаления удаления записи БД
    Route::delete('/phones/{phone}', [DestroyController::class, 'destroy'])->name('phones.delete');
