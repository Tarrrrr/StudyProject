<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Models\phoneBaseModels\categoryModel;
use App\Models\phoneBaseModels\phoneBaseModel;
use App\Models\phoneBaseModels\tagModel;

class editController extends baseController
{
    //функция редактирования записи в БД
    public function edit(phoneBaseModel $phone) {
        //передача категорий в форму создания телефона
        $categories = categoryModel::all();
        //передача тегов в форму изменения
        $tags = tagModel::all();
        //возврат страницы редактирования записи в БД и передача переменной категории
        return view('phoneBaseViews.edit', compact('phone', 'categories', 'tags'));
    }
}
