<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
   // get category
   public function getCategories(){
    $role=Auth::user();
   $categories=Category::with(['getParent'])->orderby('id','asc')->get();
   $primerCategories=Category::whereNull('parent')->orWhere('parent',0)->orderby('id','desc')->get();
  //dd($categories);
   return view('admin.categories',compact(['categories','primerCategories','role']));
   }


// store category

    public function store(CatRequest $request){
       

        if(!isset($request->parent) || empty($request->parent)) $request->parent = 0;

       Category::create([
        'title'=>$request->title,
        'title_slug' => strtolower(str_replace(' ', '-',$request->title)),
         'parent'=>$request->parent
       ]) ;
       $notification = array(
        'message' => 'تم اضافة قسم بنجاح',
        'alert-type' => 'success'
    );
        
       return  redirect(url('dashboard/category'))->with($notification); 
     
    }
   
    // update category
    
    public function update(CatRequest $request)
    {
        
        Category::findOrFail($request->id)->update([
        'title'=>$request->title,
        'title_slug' => strtolower(str_replace(' ', '-',$request->title)),
         'parent'=>$request->parent
       ]) ;
       $notification = array(
        'message' => 'تم التعديل علي القسم بنجاح',
        'alert-type' => 'success'
    );
        
       return redirect(url('dashboard/category'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request){

        Category::findOrFail($request->id)->where('parent',$request->id)->delete();

        Category::findOrFail($request->id)->delete();
        $notification = array(
            'message' => 'تم حذف القسم بنجاح',
            'alert-type' => 'success'
        );

        return redirect(url('dashboard/category'))->with($notification); 

    }// End Method 
}
