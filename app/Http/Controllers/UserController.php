<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller{

    private $model;
    public function __construct(UserRepository $user) 
	{
		$this->user = $user;
	}
 
	/**
	 * Get all users.
	 *
	 * @return Illuminate\View
	 */
	public function getAllUsers($id = null)
	{
		$users = $this->user->getAll();
        
		$editUser = (isset($id)) ? $this->user->getById($id) : null;
 
		return view('users.index', compact('users', 'editUser'));
	}
 
	/**
	 * Store a user
	 *
	 * @var array $attributes
	 *
	 * @return mixed
	 */
	public function postStoreUser(Request $request)
	{
		$attributes = $request->only(['name', 'email', 'password', 'role']);
        $attributes['password'] = bcrypt($attributes['password']);
		$this->user->create($attributes);
 
		return redirect()->route('user.index');
	}
 
	/**
	 * Update a user
	 *
	 * @var integer $id
	 * @var array 	$attributes
	 *
	 * @return mixed
	 */
	public function postUpdateUser($id, Request $request)
	{
		$attributes = $request->only(['name', 'email', 'role']);
        $password = $request->only(['password']);

        if( isset($password) && $password != ""   )
        {
            $attributes['password'] = bcrypt($attributes['password']);
        }

		$this->user->update($id, $attributes);
 
		return redirect()->route('user.index');
	}
 
	/**
	 * Delete a user
	 *
	 * @var integer $id
	 *
	 * @return mixed
	 */
	public function postDeleteUser($id)
	{
		$this->user->delete($id);
 
		return redirect()->route('user.index');
	}

    public function getGenerateUser(){

        for($i = 0; $i <= 10 ; $i++){
            $name = substr(md5(rand()), 0, 10);
            $attributes['name'] = $name;
            $attributes['email'] = $name.'@gmail.com';
            $attributes['password'] = bcrypt('123abc?');
            $attributes['role'] = 'author';

            var_dump($this->user->create($attributes));
        }

        echo 'something';
    }
}