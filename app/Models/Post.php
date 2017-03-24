<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillaple = ['title', 'body', 'slug', 'author_id'];
}