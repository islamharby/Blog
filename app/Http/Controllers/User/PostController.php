<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Auth;
use App\Post;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
         return view('user.postAdd');
    }
 
    public function process(){
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
        $a->user_id  =Auth::user()->id;
		$a->save();
		return redirect('/user/home');
    }
    public function remove($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back();
    }

    public function removeview($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/user/home');
    }

    public function edit( Request $request,$id)
    {   
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('user.postEdit',$post);
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
		return redirect('/user/home');
    }
    public function viewpost(Request $request,$id)
    {
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
        return view('user.postView',$post);
    }
        public function editview( Request $request,$id)
    {   
        $posts = Post::find($id);
        $post = array('posts'=>$posts);
         return view('user.postEdit',$post);
    }
    public function editProcessview( Request $request,$id){
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
        return redirect('/user/post-view/'.$id);
    }
}
