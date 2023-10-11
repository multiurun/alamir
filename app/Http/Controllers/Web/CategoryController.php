<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
   
    public function index(){

        $categories=Category::with(['posts' => function ($query) {
            $query->latest()->limit(4);
        }])->get();
       // $categories= Category::select('id','title')->get();
       
       
        return view('web.index',compact('categories'));
   
    }


    
    public function show($id,$title_slug){

        
        $category =Category::where('id',$id)->where('title_slug',$title_slug)->first();
        
        $posts= $category->posts()->orderBy('id','desc')->active()->paginate(15);
        $popularPosts=Post::where('popular','1')->limit(5)->get();
        //dd($posts);
        return view('web.category',compact(['category','popularPosts','posts']));
   
    }
    
}
