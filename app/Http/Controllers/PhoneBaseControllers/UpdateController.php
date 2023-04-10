<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\PhoneBaseModel;

class UpdateController extends Controller
{
    //функция изменения записи в БД
    public function update(PhoneBaseModel $phone) {
        //забираем данные с БД и помещаем в переменную
        $data = request()->validate([
            'name'=>'string',
            'phone'=>'string',
            'address'=>'string',
            'birthday'=>'date',
            'country'=>'string',
            'category_id'=>'',
            'tags'=>'',
        ]);
        //разделение переданных данных на две группы (данные контакта и теги)
        $tags = $data['tags'];
        //удаление тегов из данных телефона
        unset($data['tags']);
        //обновляем контакт
        $phone->update($data);
        //добавление новых и удаление старых тегов
        $phone->tags()->sync($tags);
        //выводим страницу обновленного контакта
        return redirect()->route('phones.show', $phone->id);
    }
}

