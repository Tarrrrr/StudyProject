<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Requests\PhoneBaseRequests\UpdateRequest;
use App\Models\PhoneBaseModel;

class UpdateController extends BaseController
{
    //функция изменения записи в БД
    public function update(UpdateRequest $request, PhoneBaseModel $phone) {
        //забираем данные из реквеста
        $data = $request->validated();
        //передача метода апдейт из сервиса
        $this->service->update($phone, $data);
        //выводим страницу обновленного контакта
        return redirect()->route('phones.show', $phone->id);
    }
}

