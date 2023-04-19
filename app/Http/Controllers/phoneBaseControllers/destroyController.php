<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Models\phoneBaseModels\phoneBaseModel;

class destroyController extends baseController
{
    //удаление записи из БД
    public function destroy(phoneBaseModel $phone) {
        $phone->delete();
        return redirect()->route('phoneBaseViews.index');
    }
}

