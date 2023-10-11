<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;

class NewsLetter extends Controller
{
    public function addSubscriber(Request $request){

        $data = $request->all();
        $subscriberCount= NewsletterSubscriber::where('email', $data['newsletter_subscriber'])->count();
        if($subscriberCount > 0) return "exists";

        else {
            NewsletterSubscriber::create(['email'=>$data['newsletter_subscriber'], 'status'=>1]);
            return "saved";
        }

    }
}
