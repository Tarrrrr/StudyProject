<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Http\Filter\phoneFilter;
use App\Http\Requests\phoneBaseRequests\filterRequest;
use App\Models\phoneBaseModels\phoneBaseModel;

class indexController extends baseController
{
    //функция отражения записей из БД (как данные передаем инфу запрошенную через реквест)
    public function index(filterRequest $request) {
        //помещаем в дату данные из запроса в базу
        $data = $request->validated();
        //создание фильтра и передача ему параметров из бд
        $filter = app()->make(phoneFilter::class, ['queryParams' => array_filter($data)]);
        //фильтрация + пагинация выводим по 10 контактов на первую страницу
        $phones = phoneBaseModel::filter($filter)->paginate(10);
        //переход на вью индекс (папка phoneBaseViews, файл index) и возврат переменной фоунс
        return view('phoneBaseViews.index', compact('phones'));
    }
}
