<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function admin_dashboard(){
      
        $categories = Category::count();

    $categories = DB::table('categories')->count();
       // dd($categories);
    
        $posts = DB::table('posts')->count();
         
        $users= DB::table('users')->count();
        
       return view('admin.home',compact(['categories','posts','users']));
 
        //return view('adminDash.dash')->with('data');
      }
}
