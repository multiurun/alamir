<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory ,HasEagerLimit;
    protected $guarded=[];


    public function getParent(){

        return $this->belongsTo(Category::class,'parent');   
        
    }
    public function childern(){

        return $this->hasMany(Category::class,'parent');   
        
    }
    public function posts(){

        return $this->hasMany(Post::class);
    
   
    }
   
}
