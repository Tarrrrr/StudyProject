<?php

namespace App\Http\Controllers\phoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Services\phoneBaseServices\service;

class baseController extends Controller
{
    //создание переменной сервис
    public $service;
    //передача методов в сервисе в контроллер
    public function __construct(service $service)
    {
        $this->service = $service;
    }
}
