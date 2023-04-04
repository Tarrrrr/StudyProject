<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneBaseModel extends Model
{
    use HasFactory;
    use SoftDeletes; //!применяем софт делит
    protected $table = 'phone_base'; //!модель работает с БД
    protected $guarded = []; //!разрешение на изменение базы данных
    //определение, что у телефона может быть только 1 категория
    public function category() {
        return $this->belongsTo(CategoryModel::class, 'category_id','id');
    }
    //определение, что у телефона может быть много комментариев
    public function comments() {
        return $this->belongsToMany(CommentModel::class, 'phone_comments', 'phone_id', 'comment_id');
    }
}
