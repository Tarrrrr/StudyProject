<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Requests\PhoneBaseRequests\StoreRequest;

class StoreController extends BaseController
{
    //функция приема данных из формы create и отображение в main
    public function store(StoreRequest $request) {
        //получение данных из реквеста
        $data = $request->validated();
        //вызов метода стор из сервисов
        $this->service->store($data);
        //редирект на главную страницу, где список постов
        return redirect()->route('phones.index');
    }
}
