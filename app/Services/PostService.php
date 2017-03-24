<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService implements PostRepository {

    private $model;

    public function __construct(Post $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function getName() {
        return $this->model->name;
    }

    public function getById($id) {
        return $this->model->find($id);
    }

    public function create(array $attribute) {
        return $this->model->create($attribute);
    }

    public function update($id, array $attribute) {
        return $this->model->find($id)->update($attribute);
    }

    public function delete($id) {
        return $this->model->find($id)->delete();
    }
    
    public function getComments() {
        $comments = $this->model->comments;
        return $comments->count() ? $comments->map(function ($comment) {
           return new CommentService($comment);
        }) : [];
    }

}
