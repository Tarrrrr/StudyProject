<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Models\CategoryModel;
use App\Models\TagModel;

class CreateController extends BaseController
{
    //функция создания записи в БД
    public function create() {
        //передача категорий в форму создания телефона
        $categories = CategoryModel::all();
        //передача на страницу создания телефона тегов
        $tags = TagModel::all();
        //возврат страницы создания записи в БД и передача переменной категории и теги
        return view('phone.create', compact('categories','tags'));
    }
}
