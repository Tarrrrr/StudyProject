<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Http\Requests\phoneBaseRequests\updateRequest;
use App\Models\phoneBaseModels\phoneBaseModel;

class updateController extends baseController
{
    //функция изменения записи в БД
    public function update(updateRequest $request, phoneBaseModel $phone) {
        //забираем данные из реквеста
        $data = $request->validated();
        //передача метода апдейт из сервиса
        $this->service->update($phone, $data);
        //выводим страницу обновленного контакта
        return redirect()->route('phoneBaseViews.show', $phone->id);
    }
}

