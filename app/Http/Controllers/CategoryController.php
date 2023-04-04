<?php

namespace App\Http\Controllers;

use App\Models\PhoneBaseModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //функция создания записи в БД
    public function create() {
        //возврат страницы создания записи в БД
        return view('phone.create');
    }
    //функция приема данных из формы create и отображение в main
    public function store() {
        //получение в переменную дата данных из формы create
        $data = request()->validate([
            'name'=>'string',
            'phone'=>'string',
            'address'=>'string',
            'birthday'=>'date',
            'country'=>'string',
        ]);
        //передача в БД данных полученных из строки
        PhoneBaseModel::create($data);
        //редирект на главную страницу, где список постов
        return redirect()->route('phones.index');
    }
    //функция обращается к модели и возвращает данные из БД по запросу (если не найдены данные возвращает 404)
    public function show(PhoneBaseModel $phone) {
        return view('phone.show', compact('phone'));
    }
    //функция редактирования записи в БД
    public function edit(PhoneBaseModel $phone) {
        return view('phone.edit', compact('phone'));
    }
    //функция изменения записи в БД
    public function update(PhoneBaseModel $phone) {
        //забираем данные с БД и помещаем в переменную
        $data = request()->validate([
            'name'=>'string',
            'phone'=>'string',
            'address'=>'string',
            'birthday'=>'date',
            'country'=>'string',
        ]);
        //обновляем контакт
        $phone->update($data);
        //выводим страницу обновленного контакта
        return redirect()->route('phones.show', $phone->id);
    }
    //удаление записи из БД
    public function destroy(PhoneBaseModel $phone) {
        $phone->delete();
        return redirect()->route('phones.index');
    }
}
