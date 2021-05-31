<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\CategoryObserver;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'parent_id');

    protected static function boot()
    {
        parent::boot();
        Category::observe(CategoryObserver::class);
        // static::saving(function ($model) {
        //     $model->slug = str_slug($model->title);
        // });
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }


    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id')->with('parent');
    }
}
