<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['title', 'content', 'user_id', 'category_id','created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

}
