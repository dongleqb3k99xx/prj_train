<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository as UserRepository;

class userController extends Controller{

    private $model; 

    public function __construct(UserRepository $user){
        $this->user = $user;
    }

    public function getAllUsers($id = null){
        $users = $this->user->getAll();
        $editUser = (isset($id)) ? $this->user->getById($id) : null;

        return view('user.index', compact('users', 'editUser'));
    }

    public function postStoreUser(Request $request){
        $attribute = $request->only(['name', 'email', 'password', 'role' ]);
        $this->task->create($attribute);

        return redirect()->route('user.index');
    }

    public function postUpdateUser($id, Request $request){
        $attribute = $request->only(['name', 'email', 'password', 'role' ]);
        $this->user->update($id, $attribute);

        return redirect()->route('user.index');
    }

    public function postDelete($id){
        $this->user->delete($id);

        return redirect()->route('user.index');
    }
}