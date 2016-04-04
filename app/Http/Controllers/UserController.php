<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

$user->name = 'John2';

$user->email = 'mail7w3@gmail.com';

$user->somekey = 'key';
$user->save();

    	return User::getU();
    }
}
