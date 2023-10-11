<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory ,HasEagerLimit;
    
    protected $guarded=[];
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query){
        return $query->where('status' ,1);
    }

}
