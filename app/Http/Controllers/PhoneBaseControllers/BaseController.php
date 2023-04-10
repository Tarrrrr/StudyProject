<?php

namespace App\Http\Controllers\PhoneBaseControllers;

use App\Http\Controllers\Controller;
use App\Services\PhoneBaseServices\Service;

class BaseController extends Controller
{
    //создание переменной сервис
    public $service;
    //передача методов в сервисе в контроллер
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
