<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use Validator;
use Illuminate\Http\Request;


class LoginController extends Controller
{
   public function index()
   {
   	return view('user.logIn');
   }

    public function process(){
		$v = Validator::make(request()->all(), [
			'email' => 'required|string|email|min:10|max:100|exists:users,email',
			'password' => 'required|string|min:4|max:50',
		]);

		if ($v->fails()) {
			session()->flash('errors', $v->messages()->toArray());
			return redirect('/login');
		}else{
			$a = User::where('email', request()->email)->first();
			if (Hash::check(request()->password, $a->password)) {
				Auth::login($a);
				if ($a->role === 'admin') {
					return redirect('/admin/panel');
				} else {
					return redirect('/user/home');
				}
			}
			session()->flash('error', 'your password is wrong!');
			return back();
		}
    }
}
