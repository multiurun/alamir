<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role=Auth::user()->role;
        if(!$role){
            return redirect(url("/dashboard"));
        }
        if( $role==0){
            return redirect(url("/dashboard"));
        }
        else
        {
            $users= User::get();
            return view('admin.users.index' , compact('users'));     
           }

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
  
            User::findOrFail($request->id)->update([
                'usertype'=>$request->usertype,
                'role'=>$request->role,
               ]) ;
              
      
        return redirect()->back(); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
       

        User::findOrFail($request->id)->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect(url('/users')); 
    }
}
