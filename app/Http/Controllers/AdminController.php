<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function getLogin(){
    	return view('admin/login');
    }

    public function postLogin(Request $request) {
        $login = $request->only('username', 'password');
    	if (Auth::attempt($login)) {
            return redirect()->route('admin');
        }
        return redirect()->back();       
    }


    public function getRegister(){
    	return view('admin/register');
    }

    public function postRegister(Request $request) {

    	$request->validate([

    		'name' => 'required',
    		'username' => 'required|unique:users',
    		'email' => 'required|email|unique:users',
    		'id_level' => 'required',
    		'password' => 'required|min:6|confirmed',
    		

    	]);

    	User::create([
    		'name' => $request->name,
    		'username' => $request->username,
    		'email' => $request->email,
    		'id_level' => $request->id_level,
    		'password' => Hash::make($request->password)
    	]);

    	return redirect()->back();
    }

    public function logout() {
    	\Auth::logout();

    	return redirect()->route('login');
    }
}
