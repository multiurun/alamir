<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function showDetile($id){
       
        $post =Post::where('id',$id)->first();
        $popularPosts=Post::where('popular','1')->limit(5)->get();
        //dd($posts);
        return view('web.single-post',compact(['post','popularPosts']));

    }
}
