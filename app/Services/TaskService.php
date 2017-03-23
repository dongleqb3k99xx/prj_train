<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService implements TaskRepository{

    private $model;

    public function __construct(Task $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->find($id);
    }

    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes){
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
}