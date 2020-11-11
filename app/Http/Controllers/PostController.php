<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = "create-post";
        return view('welcome', compact("title"));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => "required|unique:posts",
            "body" => "required",
            "post_pic" => "required|image|mimes:jpeg,png,jpg,gif,svg"
        ]);
        
        // image code
        $image = $request->file('post_pic');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
       
        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->post_pic = $imageName;
        $posts->save();

        return back()->with('post_create', "Post Created Successfully");
    }

    public function fetchallpost()
    {
        $posts = Post::all();
        $title = "posts";
        return view('posts',array('posts' => $posts, "title" => $title));
    }

    public function singlepost(Request $request)
    {
        $post = Post::find($request->id)->toArray();
        echo "<a href='/'>Back</a>";
        echo "<br>";
        echo "<br>";
        echo "title : " . $post['title']; 
        echo "<br>";
        echo "body : " . $post['body']; 
        echo "<br>";
        echo "post pic : ";
        echo "<br>";
        echo "<img width='50px' src='http://127.0.0.1:8000/images/".$post['post_pic']."' alt='post pic' />";
        echo "<br>";
        echo "created_at : " . $post['created_at']; 
        echo "<br>";
        echo "updated_at : " . $post['updated_at']; 

    }

    public function deletepost(Request $request)
    {
        $post = Post::find($request->id);
        unlink(public_path('images').'/'.$post->post_pic);
        $post->delete();
        return back()->with('post-delete', "Post Deleted");
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->id)->toArray();
        $title = "post-edit";
        return view('editpost', array('post' => $post, "title" => $title));
    }

    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasFile('post_pic')){
            $image = $request->file('post_pic');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $post->post_pic = $imageName;
         }
        $post->update();

        return back()->with('post-update', "Post Updated");
    }

    
}
