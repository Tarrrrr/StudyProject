<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PhoneBaseModel;
use Illuminate\Http\Request;

class PhoneBaseController extends Controller
{
    //функция отражения записей из БД
    public function index() {
        //определяем переменную, которая считывает все данные из БД
        $phones = PhoneBaseModel::all();
        //переход на вью индекс (папка phone, файл index) и возврат переменной фоунс
        return view('phone.index', compact('phones'));
    }
    //функция создания записи в БД
    public function create() {
        //передача категорий в форму создания телефона
        $categories = CategoryModel::all();
        //возврат страницы создания записи в БД и передача переменной категории
        return view('phone.create', compact('categories'));
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
            'category_id'=>'',
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
        //передача категорий в форму создания телефона
        $categories = CategoryModel::all();
        //возврат страницы редактирования записи в БД и передача переменной категории
        return view('phone.edit', compact('phone', 'categories'));
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
            'category_id'=>'',
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
