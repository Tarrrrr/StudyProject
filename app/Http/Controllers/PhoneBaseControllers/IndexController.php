<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\PhoneBaseModel;

class IndexController extends Controller
{
    //функция отражения записей из БД
    public function index() {
        //определяем переменную, которая считывает все данные из БД
        $phones = PhoneBaseModel::all();
        //переход на вью индекс (папка phone, файл index) и возврат переменной фоунс
        return view('phone.index', compact('phones'));
    }
}
