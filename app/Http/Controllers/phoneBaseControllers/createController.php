<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Models\phoneBaseModels\categoryModel;
use App\Models\phoneBaseModels\tagModel;

class createController extends baseController
{
    //функция создания записи в БД
    public function create() {
        //передача категорий в форму создания телефона
        $categories = categoryModel::all();
        //передача на страницу создания телефона тегов
        $tags = tagModel::all();
        //возврат страницы создания записи в БД и передача переменной категории и теги
        return view('phoneBaseViews.create', compact('categories','tags'));
    }
}
