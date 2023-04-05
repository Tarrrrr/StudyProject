<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use HasFactory;
    use SoftDeletes; //!применяем софт делит
    protected $table = 'categories'; //!модель работает с БД
    protected $guarded = []; //!разрешение на изменение базы данных
    //указываем, что у 1 категории может быть много телефонов
    public function phones() {
        return $this->hasMany(PhoneBaseModel::class, 'phone_id', 'id');
    }
}