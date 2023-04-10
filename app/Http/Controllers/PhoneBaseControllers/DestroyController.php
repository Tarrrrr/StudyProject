<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Models\PhoneBaseModel;

class DestroyController extends Controller
{
    //удаление записи из БД
    public function destroy(PhoneBaseModel $phone) {
        $phone->delete();
        return redirect()->route('phones.index');
    }
}

