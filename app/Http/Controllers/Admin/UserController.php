<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
	public function date(Request $request)
	{
		$users = User::where('firstName', 'like', "%{$request->q}%")
        ->orWhere('lastName', 'like', "%{$request->q}%")
        ->orWhere('email', 'like', "%{$request->q}%")
        ->orWhere('gender', 'like', "%{$request->q}%")
        ->orWhere('jobTitle', 'like', "%{$request->q}%")
        ->orWhere('role', 'like', "%{$request->q}%")
        ->paginate(4);

        return view('admin.users.usersView',['users' => $users]);
    }
    public function remove($id)
    {
        $user = User::find($id);
        $user->posts()->delete();
        $user->delete();
        return redirect('/admin/users');
    }
    public function edit(Request $request,$id)
    {
        $users = user::find($id);
        $user = array('user'=>$users);
		return view('admin.users.userEdit',$user);
    }
    public function editProcess(Request $request,$id)
    {
        $v = Validator::make(request()->all(), [
            'firstName' => 'required|string|min:3|max:50',
            'lastName'  => 'required|string|min:3|max:50',
            'jobTitle'  => 'required|string|min:2|max:50',
            'email'     => 'required|string|min:10|max:100',
            'password'  => 'required|string|min:4|max:50',
            'gender'    => 'required|string|in:male,female',
            'role'      => 'required|string|min:3|max:50',
            'img'       => 'nullable|file|image',

            ]);

            if ($v->fails()) {
                session()->flash('errors', $v->errors()->toArray());
                return back();
            }
            $a = user::find($id);
            $a->firstName    = request()->firstName;
            $a->lastName     = request()->lastName;
            $a->email        = request()->email;
            $a->password     = Hash::make(request()->password);
            $a->gender       = request()->gender;
            $a->jobTitle     = request()->jobTitle;
            $a->role         = request()->role;

            $img = request()->img;
             if ($img) {
                $path = request()->img->store('public/images');
                $path = str_replace('public', '/storage', $path);
                $a->img = $path;
             }
                    
            $a->save();

            return redirect('admin/users');
	}
	public function addUser()
    {
        return view('admin.users.userAdd');
    }

    public function addProcess()
    {
        $v = Validator::make(request()->all(), [
            'firstName' => 'required|string|min:3|max:50',
            'lastName' => 'required|string|min:3|max:50',
            'jobTitle'  => 'required|string|min:2|max:50',
            'email'     => 'required|string|min:10|max:100|email|unique:users,email',
            'password'  => 'required|string|min:4|max:50',
            'gender'    => 'required|string|in:male,female',
            'role'      => 'required|string|min:3|max:50',
            'img'       => 'required|file|image',

            ]);

            if ($v->fails()) {
                session()->flash('errors', $v->errors()->toArray());
                return back();
            }
         
            $a =  new User;
            $a->firstName    = request()->firstName;
            $a->lastName     = request()->lastName;
            $a->email        = request()->email;
            $a->password     = Hash::make(request()->password);
            $a->gender       = request()->gender;
            $a->jobTitle     = request()->jobTitle;
            $a->role         = request()->role;
             if (request()->img) {
                $path = request()->img->store('public/images');
                $path = str_replace('public', '/storage', $path);
                $a->img = $path;
             }

            $a->save();

            return redirect('admin/users');
    }

    public function profile(Request $request,$id)
        {
         return view('admin.users.profileEdit');
    }
    public function profileProcess(Request $request,$id){
         $v = Validator::make(request()->all(), [
         'firstName' => 'required|string|min:3|max:50',
         'lastName' => 'required|string|min:3|max:50',
         'jobTitle'  => 'required|string|min:2|max:50',
         'email'     => 'required|string|min:10|max:100',
         'password'  => 'required|string|min:4|max:50',
         'gender'    => 'required|string|in:male,female',
         'img'       => 'nullable|file|image',
 
         ]);
 
         if ($v->fails()) {
             session()->flash('errors', $v->errors()->toArray());
             return back();
         }
         

             $a = user::find($id);
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
             return redirect('admin/panel');
    }
}
