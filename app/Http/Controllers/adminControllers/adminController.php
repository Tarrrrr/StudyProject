<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\phoneBaseControllers\baseController;

class adminController extends baseController
{
    public function __invoke()
    {
        return view('layouts.admin');
    }
}
