<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\PhoneBaseModel;

class StoreController extends Controller
{
    //функция приема данных из формы create и отображение в main
    public function store() {
        //получение в переменную дата данных из формы create
        $data = request()->validate([
            //required меняет поле уведомления ошибки на поле должно быть заполнено
            'name'=>'required|string',
            'phone'=>'required|string',
            'address'=>'required|string',
            'birthday'=>'required|date',
            'country'=>'required|string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        //разделение переданных данных на две группы (данные контакта и теги)
        $tags = $data['tags'];
        //удаление тегов из данных телефона
        unset($data['tags']);
        //передача в БД данных полученных из строки
        $phone = PhoneBaseModel::create($data);
        //обработка тегов и передача в базу данных PhoneTagController
        $phone->tags()->attach($tags);
        //редирект на главную страницу, где список постов
        return redirect()->route('phones.index');
    }
}
