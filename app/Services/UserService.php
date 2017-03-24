<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService implements UserRepository{
    private $model;

    public function __construct(User $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function create(array $attribute){
        return $this->model->create($attribute);
    }

    public function update($id, array $attribute){
        return $this->model->find($id)->update($attribute);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
    
    public function getName() {
        return $this->model->name;
    }
    
    public function exists() {
        return $this->model && $this->model->exists;
    }
    
    public function getPosts() {
        $posts = $this->model->posts;
        return $posts->count() ? $posts->map(function($post) {
            return new PostService($post);
        }) : [];
    }
}