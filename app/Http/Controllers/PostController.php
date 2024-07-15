<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index(){

        $userFromDB = User::all();
        $postsFromDB = Post::all();
  

        return view('index', ['posts'=>$postsFromDB, 'users'=>$userFromDB]);

    }
    // convention over configration : if you follow the naming prencipils the framework will short the code 
    public function show(Post $post){ //route model binding + tybe hinting must the name of passing id from rout shoud be same as same passing parameter into show function 

        // dd($post);

        //  $singlePost= Post::find($postId);
        // $singlePost = Post::where('id',$postId)->first();
       return view('show', ['post'=>$post]);
    }

    public function create(){
        $users = User::all();

    return view('create', ['users'=>$users]);        

    }
    
    public function store(){
        request()->validate([
            'title'=>['required', 'min:5'],
            'description'=>['required','min:5'],
            'postCreator'=>['required','exists:users,id'],
            
        ]);
        
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;


        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();
        Post::create([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
        ]);
        // $post->save();
        return to_route('allPosts');
    }


    public function edit(Post $post){
        $users = User::all();
        return view('edit',['users'=>$users , 'post'=>$post]);
    }



    public function update($postId){
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;




        $singlePostfromDB = Post::find($postId);
        $singlePostfromDB->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
        ]);


        // return response()->json($data); 
        return to_route('posts.show',$postId);
        }


        public function destroy($id)
        {
            $post = Post::find($id);

            $post->delete();

            return to_route('allPosts');
        }
}
