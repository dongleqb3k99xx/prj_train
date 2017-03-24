<?php 

namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;

class CommentService implements CommentRepository{
    private $model;

    public function __construct(Comment $model){
        $this->$model = $model;
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
}