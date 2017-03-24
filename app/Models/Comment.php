<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = ['body', 'on_post', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'from_user', 'id');
    }

}
