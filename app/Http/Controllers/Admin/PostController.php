<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function data(Request $request)
    {
        $posts = Post::where('title', 'like', "%{$request->q}%")
        ->orWhere('body', 'like', "%{$request->q}%")
        ->paginate(1);

        return view('admin.posts.posts', ['posts' => $posts]);
	}
	public function remove($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/panel');
    }
    public function removeControll($id)
        {
        $post = Post::find($id);
        $post->delete();
    return redirect('admin/posts');
    }
    public function add()
        {
        return view('admin.posts.postAdd');
    }
 
    public function addprocess(){
		$v = Validator::make(request()->all(), [
		'title'     => 'required|string|min:3|max:50',
		'body'  => 'required|string|min:3|max:20000000',
		]);

		if ($v->fails()) {
			session()->flash('errors', $v->errors()->toArray());
			return back();
		}
		$a = new Post;
		$a->title    = request()->title;
		$a->body     = request()->body;
        $a->user_id  = Auth::user()->id;
		$a->save();
		return redirect('admin/panel');
    }
    public function addcontroll()
        {
        return view('admin.posts.postAdd');
    }
 
    public function addprocesscontroll(){
        $v = Validator::make(request()->all(), [
        'title'     => 'required|string|min:3|max:50',
        'body'  => 'required|string|min:3|max:20000000',
        ]);

        if ($v->fails()) {
            session()->flash('errors', $v->errors()->toArray());
            return back();
        }
        $a = new Post;
        $a->title    = request()->title;
        $a->body     = request()->body;
        $a->user_id  = Auth::user()->id;
        $a->save();
        return redirect('admin/posts');
    }
    public function edit( Request $request,$id)
        {   
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('admin.posts.postEdit',$post);
    }
    public function editProcess( Request $request,$id){
		$v = Validator::make(request()->all(), [
		'title'     => 'required|string|min:3|max:50',
		'body'  => 'required|string|min:3|max:20000000',
		]);

		if ($v->fails()) {
			session()->flash('errors', $v->errors()->toArray());
			return back();
		}
		$a = Post::find($id) ;
		$a->title    = request()->title;
		$a->body     = request()->body;
        $a->user_id  =Auth::user()->id;
		$a->save();
		return redirect('admin/panel');
    }
    public function editcontroll( Request $request,$id)
        {   
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('admin.posts.postEdit',$post);
    }
    public function editProcessControll( Request $request,$id){
        $v = Validator::make(request()->all(), [
        'title'     => 'required|string|min:3|max:50',
        'body'  => 'required|string|min:3|max:20000000',
        ]);

        if ($v->fails()) {
            session()->flash('errors', $v->errors()->toArray());
            return back();
        }
        $a = Post::find($id) ;
        $a->title    = request()->title;
        $a->body     = request()->body;
        $a->user_id  =Auth::user()->id;
        $a->save();
        return redirect('admin/posts');
    }
    public function viewpost(Request $request,$id)
    {
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('admin.posts.postView',$post);
    }
        public function editview( Request $request,$id)
        {   
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('admin.posts.postEdit',$post);
    }
    public function editProcessView( Request $request,$id){
        $v = Validator::make(request()->all(), [
        'title'     => 'required|string|min:3|max:50',
        'body'  => 'required|string|min:3|max:20000000',
        ]);

        if ($v->fails()) {
            session()->flash('errors', $v->errors()->toArray());
            return back();
        }
        $a = Post::find($id) ;
        $a->title    = request()->title;
        $a->body     = request()->body;
        $a->user_id  =Auth::user()->id;
        $a->save();
        return redirect('admin/post-view/'.$id);
    }
}
