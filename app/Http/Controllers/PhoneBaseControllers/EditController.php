<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PhoneBaseModel;
use App\Models\TagModel;

class EditController extends Controller
{
    //функция редактирования записи в БД
    public function edit(PhoneBaseModel $phone) {
        //передача категорий в форму создания телефона
        $categories = CategoryModel::all();
        //передача тегов в форму изменения
        $tags = TagModel::all();
        //возврат страницы редактирования записи в БД и передача переменной категории
        return view('phone.edit', compact('phone', 'categories', 'tags'));
    }
}
