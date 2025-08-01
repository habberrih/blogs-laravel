<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(): string
    {

        $allPosts = [
            ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-10'],
            ['id' => 2, 'title' => 'TypeScript', 'posted_by' => 'Habberrih', 'created_at' => '2019-01-11'],
            ['id' => 3, 'title' => 'HTML', 'posted_by' => 'Khalid', 'created_at' => '2019-01-12'],
            ['id' => 4, 'title' => 'Python', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-13'],
            ['id' => 5, 'title' => 'CPP', 'posted_by' => 'Ahmed', 'created_at' => '2019-01-14'],
        ];
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show(int $postId): string {
        return view('posts.show', ['post_id' => $postId]);
    }

    public function create(): string {
        return view('posts.create');
    }
}
