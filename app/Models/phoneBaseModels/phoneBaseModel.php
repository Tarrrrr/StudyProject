<?php

namespace App\Models\phoneBaseModels;

use App\Models\traits\filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class phoneBaseModel extends Model
{
    use HasFactory;
    //применение фильтра к модели
    use filterable;
    use SoftDeletes; //!применяем софт делит
    protected $table = 'phone_base'; //!модель работает с БД
    protected $guarded = []; //!разрешение на изменение базы данных
    //определение, что у телефона может быть только 1 категория
    public function category() {
        return $this->belongsTo(categoryModel::class, 'category_id','id');
    }
    //определение, что у телефона может быть много комментариев
    public function tags() {
        return $this->belongsToMany(tagModel::class, 'phone_tags', 'phone_id', 'tag_id');
    }
}
