<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }

}
