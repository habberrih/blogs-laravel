<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(): string
    {

        $all_posts  = Post::all();
        return view('posts.index', ['posts' => $all_posts]);
    }

    public function show(Post $post): string {
//        $singlePost = Post::where('id', $postId) -> first(); // or get(): more than one raw
//
//        if(is_null($singlePost)) {
//            return to_route('posts.index');
//        }
        return view('posts.show', ['post' => $post]);
    }

    public function create(): string {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(): string {

        // get the user data from the form (frontend)
        $data = request()->all();

//        $post = new Post();
//        $post->title = $data['title'];
//        $post->description = $data['description'];
//        //$post->postCreator = $data['postCreator'];
//        $post->save();

        Post::creat([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post): string {

        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update(int $postId): string {

        $data = request()->all();

        $existsPost = Post::find($postId);
        $existsPost->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);


        return to_route('posts.show', $postId);
    }

    public function destroy(): string {
    return to_route('posts.index');
    }
}
