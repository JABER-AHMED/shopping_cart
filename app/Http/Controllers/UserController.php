<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignUp()
    {
    	return view('user.signup');
    }

    public function postSignUp(Request $request)
    {
    	$this->validate($request, array(

    		'email' => 'required|email|unique:users',
    		'name' => 'required|max:50',
    		'password' => 'required|min:6'
    	));

    	$user = new User();

    	$user->email = $request->email;
    	$user->name = $request->name;
    	$user->password = bcrypt($request->password);

    	$user->save();

        Auth::login($user);

    	return redirect()->route('user.signin');
    }

    public function getSignIn()
    {
    	return view('user.signin');
    }

    public function postSignIn(Request $request)
    {
    	$this->validate($request, array(

    		'email' => 'required|email',
    		'password' => 'required|max:6'
    	));

    	if (Auth::attempt([

    		 'email' => $request->input('email'),
    		 'password' => $request->input('password')

    		])) {
    		
    		return redirect()->route('user.profile');
    	}else{

    		return redirect()>back();
    	}
    }

    public function getUserProfile()
    {
    	return view('user.profile');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('user.signin');
    }
}
