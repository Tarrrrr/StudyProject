<?php

namespace Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ost extends Model
{
    use HasFactory;
    //!мягкое удаление (запись остается в бд, но не высвечивается)
    use SoftDeletes;
    //!дополнительное указание, что данная модель работает с таблицей бд постс
    protected $table = 'posts';
    //!разрешение на изменение базы данных
    protected $guarded = [];
}
