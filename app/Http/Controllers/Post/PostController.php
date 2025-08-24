<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(): string
    {

        $all_posts  = Post::all();
        $allPosts = [
            ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-10'],
            ['id' => 2, 'title' => 'TypeScript', 'posted_by' => 'Habberrih', 'created_at' => '2019-01-11'],
            ['id' => 3, 'title' => 'HTML', 'posted_by' => 'Khalid', 'created_at' => '2019-01-12'],
            ['id' => 4, 'title' => 'Python', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-13'],
            ['id' => 5, 'title' => 'CPP', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-14'],
        ];
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
        return view('posts.create');
    }

    public function store(): string {

        // get the user data from the form (frontend)
        $data = request()->all();

        return to_route('posts.index');
    }

    public function edit(): string {

        return view('posts.edit');
    }

    public function update(): string {

        $data = request()->all();
        return to_route('posts.show', 1);
    }

    public function destroy(): string {
    return to_route('posts.index');
    }
}
