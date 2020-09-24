<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
    ];
    public function items(){
        return $this->hasMany('App\SliderItem', 'id_slider');
    }
}
