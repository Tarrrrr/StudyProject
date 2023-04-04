<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    public function phones() {
        return $this->belongsToMany(PhoneBaseModel::class, 'phone_comments', 'comment_id', 'phone_id');
    }
}
