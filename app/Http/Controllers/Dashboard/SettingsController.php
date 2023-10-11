<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingsController extends Controller
{
    public function index(){
        
       $settings=Setting::first();
      //dd($settings);
       
       return view('admin.settings.settings',compact('settings'));
    }

    public function edit($id){
        
        $setting=Setting::findOrFail($id);
       // dd($settings);
        return view('admin.settings.edit',compact('setting'));
     }
     
    
    // store category
    
    public function update(SettingRequest $request){
    
       
        Setting::findOrFail($request->id)->update([

        'phone'=>$request->phone,
        'email'=>$request->email,
        'facebook'=>$request->facebook,
        'twitter'=>$request->twitter,
        'instaram'=>$request->instaram,
        'youtube'=>$request->youtube,
        'linkedin'=>$request->linkedin,
    ]) ;
    $notification = array(
        'message' => 'تم  التعديل بنجاح',
        'alert-type' => 'success'
    );
        
    return  redirect(url('dashboard/settings'))->with($notification); 
    
    }
   
    
}
