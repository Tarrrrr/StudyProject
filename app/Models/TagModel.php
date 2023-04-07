<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagModel extends Model
{
    use HasFactory;
    use SoftDeletes; //!применяем софт делит
    protected $table = 'tags'; //!модель работает с БД
    protected $guarded = false; //!разрешение на изменение базы данных
    public function phones() {
        return $this->belongsToMany(PhoneBaseModel::class, 'phone_tags', 'tag_id', 'phone_id');
    }
}
