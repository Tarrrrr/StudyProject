<?php


use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index() {
        return view('contacts');
    }
}
