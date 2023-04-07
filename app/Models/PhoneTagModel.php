<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneTagModel extends Model
{
    use HasFactory;
    use SoftDeletes; //!применяем софт делит
    protected $table = 'phone_tags'; //!модель работает с БД
    protected $guarded = []; //!разрешение на изменение базы данных
}
