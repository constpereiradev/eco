<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index(){
        //All posts

        $posts = Post::all();
        return response()->json([$posts]);
    }

    public function create(Request $request, string $id){

        $user = User::with('phone', 'posts')->find($id);
        //$phone = $user->phone;

        $post = $user->posts()->create([
            'post' => $request['post'],
        ]);

        if ($post->save()){

            return back();
            
        } else {

            return 'error!';
        }

        

    }



    public function store(Request $request, string $id){

        $user = User::with('phone', 'posts')->find($id);
        //$phone = $user->phone;

        $post = $user->posts()->create([
            'post' => $request['post'],
        ]);

        if ($post->save()){

            $statusCode = 200;
            $message = 'Success!';

        } else {

            $statusCode = 500;
            $message = 'Sorry. We could not create a new post.';
        }

        $headers = [
            'User' => $user,
            'Status' => $statusCode,
            'Message' => $message,
            //'Phone:' => $phone,
            'Posts:' => $post,
        ];

        return response()
        ->json([$headers]);

    }

    public function update(Request $request, string $post_id, string $user_id){

        $user = User::find($user_id);
        $post = $user->posts()->find($post_id);

        $post->update([
            'post' => $request->post
        ]);

        if ($post->save()){

            $statusCode = 200;
            $message = 'Success!';

        } else {

            $statusCode = 500;
            $message = 'Sorry. We could not upda the post.';
        }

        $headers = [
            'User: ' => $user,
            'Status: ' => $statusCode,
            'Message: ' => $message,
            'Post updated: ' => $post,
        ];

        return response()
        ->json([$headers]);

    }

    public function show(string $user_id, string $post_id){

        //Read a user posts
        $user = User::find($user_id);
        $post = Post::find($post_id);

        $post = $user->posts()->find($post);

        return $post;
    }


    //api
    public function destroy(string $user_id, string $post_id){

        $user = User::find($user_id);
        $post = Post::find($post_id);

        $post = $user->posts()->find($post_id);

        $post->delete();

        return response()->json('Success!', 200);
    }


    //web
    public function delete(string $user_id, string $post_id){

        $user = User::find($user_id);
        $post = Post::find($post_id);

        $post = $user->posts()->find($post_id);

        $post->delete();

        return back();
    }
}
