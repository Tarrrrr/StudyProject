<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
//!добавление нового пути (поиск по базе)
//!name - присвоение якоря для перехода по ссылке из меню
Route::get('/posts', [\App\Http\Controllers\Study\MyPostController::class, 'index'])->name('post.index');
//!добавление нового пути (создание записи в базе)
Route::get('/posts/create', [\App\Http\Controllers\Study\MyPostController::class, 'create'])->name('post.create');
//!прием данных от формы записи поста
Route::post('/posts', [\App\Http\Controllers\Study\MyPostController::class, 'store'])->name('post.store');
//!показ определенного поста
Route::get('/posts/{post}', [\App\Http\Controllers\Study\MyPostController::class, 'show'])->name('post.show');
//!изменение поста
Route::get('/posts/{post}/edit', [\App\Http\Controllers\Study\MyPostController::class, 'edit'])->name('post.edit');
//!роут для изменения поста
Route::patch('/posts/{post}', [\App\Http\Controllers\Study\MyPostController::class, 'update'])->name('post.update');
//!роут для удаления поста
Route::delete('/posts/{post}', [\App\Http\Controllers\Study\MyPostController::class, 'destroy'])->name('post.delete');


Route::get('/main', [\App\Http\Controllers\Study\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\Study\ContactsController::class, 'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\Study\AboutController::class, 'index'])->name('about.index');
//!добавление нового пути (изменение записи в базе)
Route::get('/posts/update', [\App\Http\Controllers\Study\MyPostController::class, 'update']);
//!добавление нового пути (удаление записи в бд)
Route::get('/posts/delete', [\App\Http\Controllers\Study\MyPostController::class, 'delete']);
//!добавление нового пути (восстановление записи в бд)
Route::get('/posts/restore', [\App\Http\Controllers\Study\MyPostController::class, 'restore']);
//!добавление записи с проверкой на уникальность (если находит, то возвращает, если нет, то добавляет)
Route::get('/posts/first_or_create', [\App\Http\Controllers\Study\MyPostController::class, 'firstOrCreate']);
//!обновление записи с проверкой на уникальность (если находит, то обновляет, если нет, то добавляет)
Route::get('/posts/update_or_create', [\App\Http\Controllers\Study\MyPostController::class, 'updateOrCreate']);*/

//роут к выводу всех записей в БД с функцией индекс (забор с контроллера) с именем по конвенции ларавел
Route::get('/phones', [\App\Http\Controllers\PhoneBaseController::class, 'index'])->name('phones.index');
//роут к созданию записи в БД с функцией create и именем по конвенции
Route::get('/phones/create', [\App\Http\Controllers\PhoneBaseController::class, 'create'])->name('phones.create');
//роут, куда придут данные с формы create с именем по конвенции ларавел
Route::post('/phones', [\App\Http\Controllers\PhoneBaseController::class, 'store'])->name('phones.store');
//роут отображения всех телефонов из БД
Route::get('/phones/{phone}', [\App\Http\Controllers\PhoneBaseController::class, 'show'])->name('phones.show');
//роут редактирования записи в БД (страница редактирования)
Route::get('/phones/{phone}/edit', [\App\Http\Controllers\PhoneBaseController::class, 'edit'])->name('phones.edit');
//роут изменения записи БД
Route::patch('/phones/{phone}', [\App\Http\Controllers\PhoneBaseController::class, 'update'])->name('phones.update');
//роут удаления удаления записи БД
Route::delete('/phones/{phone}', [\App\Http\Controllers\PhoneBaseController::class, 'destroy'])->name('phones.delete');
