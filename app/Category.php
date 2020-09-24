<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_title',
        'seo_description',
        'thumb',
        'text_green',
        'text_white',
        'templates',
    ];
    public function produkty(){
        return $this->hasMany('App\Blog', 'category');
    }
}
 