<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    //function show postes
    public function index(){
        $role=Auth::user();
        $posts=Post::get();
        $primerCategories=Category::whereNull('parent')->orWhere('parent',0)->get();
       
        return view('admin.posts.posts',compact(['posts','primerCategories','role']));
    }
    //function show post
    public function show($id,$title_slug){
       // dd($request);
       $post =Post::where('id',$id)->where('title_slug',$title_slug)->first();
        $user_id=$post->user_id;
        $user=User::where('id',$user_id)->first();
        return view('admin.posts.show',compact(['post','user']));
    } 

    //function add postes
    public function add(){
        $categories=Category::all();
        if(count($categories)>0){
 
         $primerCategories= Category::select('id','title')->get();
         
 
         return view('admin.posts.addPost',compact(['primerCategories']));
          }
          $notification = array(
             'message' => 'يجب ان تضيف اقسام اولا',
             'alert-type' => 'success'
         );
 
          return redirect(url('dashboard/category'))->with($notification);
    }
    // store posts
    public function Store(StoreRequest $request){
        $user_id=Auth::user()->id;
            $post=Post::create([
            'title'=>$request->title,
            'title_slug' => strtolower(str_replace(' ', '-',$request->title)),
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'key_words'=>$request->key_words,
            'user_id'=>$user_id
            ]) ;
            if($request->file('file_name')){
                $image = $request->file('file_name');
                $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/post'), $image_name);
                $save_url = 'upload/post/'.$image_name;
                $post->update([
                    'image' => $save_url,
                ]);
            }
        if ($request->file('video')){
            $video = $request->file('video');
            $video_name = hexdec(uniqid()).'.'.$video->getClientOriginalExtension();
            $video->move(public_path('upload/post'), $video_name);
            $video_url = 'upload/post/'.$video_name;    
            $post->update([
                'video' => $video_url,
            ]);
        }
        $notification = array(
            'message' => 'تم انشاء خبر بنجاح',
            'alert-type' => 'success'
        );
        return redirect(url('dashboard/post'))->with($notification);
   }

    // Method  edit
   public function edit($id,$title_slug){
    $post =Post::findOrFail($id);
    $primerCategories=Category::select('id','title')->get();
    return view('admin.posts.edit', compact(['post','primerCategories']));
   }

    // Method  update
    public function update( EditRequest $request){
    //    dd($request);
    $post_id = $request->id;
    $old_image = $request->old_image;
    $old_video = $request->old_video;

    post::findOrFail($post_id)->update([
        'title'=>$request->title,
        'title_slug' => strtolower(str_replace(' ', '-',$request->title)),
        'content'=>$request->content,
        'category_id'=>$request->category_id,
        'meta_title'=>$request->meta_title,
        'meta_description'=>$request->meta_description,
        'key_words'=>$request->key_words,
        'image'=>$old_image,
        'video'=>$old_video,
    ]);
    if ($request->file('file_name')) {
        unlink($old_image);
        unlink($old_video);

    $image = $request->file('file_name');
    $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    
    $image->move(public_path('upload/post'), $image_name);
    $save_url = 'upload/post/'.$image_name;
    Post::findOrFail($post_id)->update([
        'image' => $save_url,
    ]);
    } 
    if ($request->file('video')){
        unlink($old_image);
        unlink($old_video);
        $video = $request->file('video');
        $video_name = hexdec(uniqid()).'.'.$video->getClientOriginalExtension();
        $video->move(public_path('upload/post'), $video_name);
        $video_url = 'upload/post/'.$video_name;    
        Post::findOrFail($post_id)->update([
            'video' => $video_url,
        ]);
        } 
    $notification = array(
        'message' => 'تم تعديل الخبر بنجاح',
        'alert-type' => 'success'
    );
    return redirect(url('dashboard/post'))->with($notification);
}

public function delete(Request $request){
    $post = Post::findOrFail($request->id);
    $img = $post->image;
    $vid = $post->video;
    if($img){
    unlink($img ); 
    }
    if($vid){
        unlink($vid ); 
    }
   Post::findOrFail($request->id)->delete();
    $notification = array(
        'message' => 'تم حذف الخبر بنجاح',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification); 
}// End Method



// start function toggle
public function toggle(Request $request){
    $post = Post::findOrFail($request->id);
    $post->update([
 'status' => !$post -> status 
]);
return back();
}

//End Method

// start function popular
public function popular($id){
    $post = Post::findOrFail($id);
    $post->update([
    'popular' => !$post -> popular 
    ]);

    $notification = array(
        'message' => ' خبر شائع',
        'alert-type' => 'success'
    );
return back()->with($notification);
}

//End Method
   
}
