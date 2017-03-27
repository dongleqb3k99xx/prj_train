<?php 

namespace App\ModelViews;

class PostViewModel{

    public $postId;

    public $title;

    public $body;

    public $slug;

    public $active;

    public $comments = array();
}