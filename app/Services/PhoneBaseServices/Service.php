<?php

namespace App\Services\PhoneBaseServices;

use App\Models\PhoneBaseModel;

class Service
{
    //функция приема данных из формы create
    public function store($data) {
        //разделение переданных данных на две группы (данные контакта и теги)
        $tags = $data['tags'];
        //удаление тегов из данных телефона
        unset($data['tags']);
        //передача в БД данных полученных из строки
        $phone = PhoneBaseModel::create($data);
        //обработка тегов и передача в базу данных PhoneTagController
        $phone->tags()->attach($tags);
    }
    //функция изменения записи в БД
    public function update($phone, $data) {
        //разделение переданных данных на две группы (данные контакта и теги)
        $tags = $data['tags'];
        //удаление тегов из данных телефона
        unset($data['tags']);
        //обновляем контакт
        $phone->update($data);
        //добавление новых и удаление старых тегов
        $phone->tags()->sync($tags);
    }
}
