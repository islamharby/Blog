<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index(Request $request)
	{
		$posts = Post::where('title', 'like', "%{$request->q}%")
		->orWhere('body', 'like', "%{$request->q}%")
		->paginate(2);

		return view('admin.panel', ['posts' => $posts]);
	}	
}
