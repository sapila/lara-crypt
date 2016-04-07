<?php

namespace App\Http\Controllers;

use Request;

use App\User;
use View;

class UserController extends Controller
{
    public function index(){
    	$users =  User::all();

    	return View::make('users')->with('users', $users);
    }
    public function show($id){

    	return User::where('id',$id)->get();
    }
    public function store(){

		$user = new User;
		$user->name = Request::input('name');
		$user->address = Request::input('address');
		$user->email = Request::input('email');
		$user->username =  Request::input('username');
		$user->password =  Request::input('password');
		$user->recordencryptionkey = str_random(32);;
		$user->save();

    	return "done";
    }
}
