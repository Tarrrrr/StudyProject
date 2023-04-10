<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\PhoneBaseModel;

class ShowController extends Controller
{
    //функция обращается к модели и возвращает данные из БД по запросу (если не найдены данные возвращает 404)
    public function show(PhoneBaseModel $phone) {
        return view('phone.show', compact('phone'));
    }
}

