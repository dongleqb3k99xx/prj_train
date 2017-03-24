<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillaple = ['title', 'body', 'slug', 'author_id'];

    /**
     * Get a collection of comments belong to this post
     */
    public function comments() {
        return $this->hasMany(Comment::class, 'on_post', 'id');
    }

}
