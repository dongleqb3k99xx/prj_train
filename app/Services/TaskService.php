<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use App\ModelViews\TaskViewModel;

class TaskService implements TaskRepository{

    private $model;

    public function __construct(Task $model){
        $this->model = $model;
    }

    public function getAll(){
        $tasks = $this->model->all();
        return TaskService::mappingListModelView($tasks);
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

    /*
    * function mappingListModelView
    * return Task View Model
    */
    private static function mappingModelView(Task $task = null){
        $taskViewModel = new TaskViewModel();
        $taskViewModel->taskId = $task->id;
        $taskViewModel->description = $task->description;

        return $taskViewModel;
    }

    /*
    * function mappingListModelView
    * return list Task View Model
    */
    public static function mappingListModelView($tasks = null){
        $taskViewModelList = array();
        foreach($tasks as $task){
            $taskVM = new TaskViewModel();
            $taskVM->id = $task->id;
            $taskVM->description = $task->description;
            array_push($taskViewModelList, $taskVM);
        }

        return $taskViewModelList;
    }
}