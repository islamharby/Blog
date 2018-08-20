<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
   public function index()
   {
		return view('user.signUp');
   }

    public function process(){
		$v = Validator::make(request()->all(), [
		'firstName' => 'required|string|min:3|max:50',
		'lastName'  => 'required|string|min:3|max:50',
		'jobTitle'  => 'required|string|min:2|max:50',
		'email'     => 'required|string|min:10|max:100|email|unique:users,email',
		'password'  => 'required|string|min:4|max:50',
		'gender'    => 'required|string|in:male,female',
		'img'       => 'nullable|file|image',

		]);

		if ($v->fails()) {
			session()->flash('errors', $v->errors()->toArray());
			return back();
		}
		
		$a = new User;
		$a->firstName    = request()->firstName;
		$a->lastName     = request()->lastName;
		$a->email        = request()->email;
		$a->password     = Hash::make(request()->password);
		$a->gender       = request()->gender;
		$a->jobTitle     = request()->jobTitle;
        if (request()->img) {
            $path = request()->img->store('public/images');
            $path = str_replace('public', '/storage', $path);
            $a->img = $path;
        }
		$a->save();
		Auth::login($a);
		return redirect('/user/home');
    }
}
