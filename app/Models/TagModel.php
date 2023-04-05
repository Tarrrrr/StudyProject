<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;
    public function phones() {
        return $this->belongsToMany(PhoneBaseModel::class, 'phone_tags', 'tag_id', 'phone_id');
    }
}
