<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Models\phoneBaseModels\phoneBaseModel;

class showController extends baseController
{
    //функция обращается к модели и возвращает данные из БД по запросу (если не найдены данные возвращает 404)
    public function show(phoneBaseModel $phone) {
        return view('phoneBaseViews.show', compact('phone'));
    }
}

