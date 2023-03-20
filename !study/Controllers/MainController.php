<?php


use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        return view('main');
    }
}
