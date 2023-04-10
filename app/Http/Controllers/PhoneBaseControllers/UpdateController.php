<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneBaseRequests\UpdateRequest;
use App\Models\PhoneBaseModel;

class UpdateController extends Controller
{
    //функция изменения записи в БД
    public function update(UpdateRequest $request, PhoneBaseModel $phone) {
        //забираем данные из реквеста
        $data = $request->validated();
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

