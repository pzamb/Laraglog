<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::
        join('post_images','post_images.post_id','=','posts.id')->
        join('categories','categories.id','=','posts.category_id')->
        select('posts.*','categories.title as category','post_images.image as imagen')->
        orderBy('posts.created_at','desc')->simplePaginate(5);
        return $this->successResponse($posts);
    }

    public function show(Post $post)
    {
        $post->category;
        $post->image;
        $post->images;
        return $this->successResponse($post);
    }

    public function url_clean(String $url_clean)
    {
        $post = Post::where('url_clean',$url_clean)->firstOrFail();
        $post->category;
        $post->image;
        return $this->successResponse($post);
    }
    
    public function category(Category $category)
    {
        $posts = Post::
        join('post_images','post_images.post_id','=','posts.id')->
        join('categories','categories.id','=','posts.category_id')->
        select('posts.*','categories.title as category','post_images.image as imagen')->
        orderBy('posts.created_at','desc')->
        where('categories.id',$category->id)
        ->simplePaginate(5);
        return $this->successResponse(["posts" => $posts,"category" => $category]);
    }
}
