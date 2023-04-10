<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Models\PhoneBaseModel;

class DestroyController extends BaseController
{
    //удаление записи из БД
    public function destroy(PhoneBaseModel $phone) {
        $phone->delete();
        return redirect()->route('phones.index');
    }
}

