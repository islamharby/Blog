<?php

namespace App\Http\Controllers\User;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$posts = Post::where('title', 'like', "%{$request->q}%")
		->orWhere('body', 'like', "%{$request->q}%")
		->paginate(4);

		return view('user.home', ['posts' => $posts]);

    }
}
