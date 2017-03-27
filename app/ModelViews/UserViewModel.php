<?php

namespace App\ModelViews;

class LoginViewModel{

    public $userId;

    public $password;

    public $remember_token;
}

class UserViewModel{

    public $userId;

    public $name;

    public $email;

    public $role;

    public $posts = array();

    public $comments = array();
}