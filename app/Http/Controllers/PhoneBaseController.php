<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PhoneBaseModel;
use App\Models\PhoneTagModel;
use App\Models\TagModel;
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
        //передача на страницу создания телефона тегов
        $tags = TagModel::all();
        //возврат страницы создания записи в БД и передача переменной категории и теги
        return view('phone.create', compact('categories','tags'));
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
    //функция обращается к модели и возвращает данные из БД по запросу (если не найдены данные возвращает 404)
    public function show(PhoneBaseModel $phone) {
        return view('phone.show', compact('phone'));
    }
    //функция редактирования записи в БД
    public function edit(PhoneBaseModel $phone) {
        //передача категорий в форму создания телефона
        $categories = CategoryModel::all();
        //передача тегов в форму изменения
        $tags = TagModel::all();
        //возврат страницы редактирования записи в БД и передача переменной категории
        return view('phone.edit', compact('phone', 'categories', 'tags'));
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
    //удаление записи из БД
    public function destroy(PhoneBaseModel $phone) {
        $phone->delete();
        return redirect()->route('phones.index');
    }
}
