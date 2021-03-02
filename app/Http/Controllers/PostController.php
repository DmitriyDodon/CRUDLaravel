<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController
{
    public function show(Request $request)
    {
        $posts = Post::paginate(5);
        return view('Post/post-list', compact('posts', 'request'));
    }


    public function delete(Post $post, Request $request)
    {
        $post->tags()->detach();
        $post->delete();
        $request->session()->push('status', "Post with title \"" . $post->title . "\" was deleted.");
        return new RedirectResponse('/post');
    }

    public function create()
    {
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('Post/post-form' , compact('tags' , 'users' , 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:posts,title', 'max:255'],
            'body' => ['required' , 'min:10'],
            'user_id' => ['required' , 'exists:users,id'],
            'category_id' => ['required' , 'exists:categories,id'],
            'tags' => ['required' , 'exists:tags,id']

        ]);

        $post = Post::create($data);
        $post->tags()->attach($data['tags']);
        $request->session()->push('status', "Post with title " . $data['title'] . "  was created.");
        return new RedirectResponse('/post');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('Post/post-form' , compact('post' , 'tags' , 'users' , 'categories'));
    }


    public function update(Request $request ,Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:posts,title,'.$post->id , 'max:255'],
            'body' => ['required' , 'min:10'],
            'user_id' => ["required" , "exists:users,id"],
            'category_id' => ['required' , "exists:categories,id"],
            'tags' => ['required' , "exists:tags,id"]
        ]);

        $post->update($data);
        $post->tags()->sync($data['tags']);
        $request->session()->push('status' , 'Category with title ' . $data['title'] . " was updated.");
        return new RedirectResponse('/post');
    }
}
