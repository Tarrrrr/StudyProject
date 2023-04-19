<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Http\Requests\phoneBaseRequests\storeRequest;

class storeController extends baseController
{
    //функция приема данных из формы create и отображение в main
    public function store(storeRequest $request) {
        //получение данных из реквеста
        $data = $request->validated();
        //вызов метода стор из сервисов
        $this->service->store($data);
        //редирект на главную страницу, где список постов
        return redirect()->route('phoneBaseViews.index');
    }
}
