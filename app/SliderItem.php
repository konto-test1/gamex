<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'id_slider',
        'title',
        'description',
        'photo',
        'more_info',
        'link',
        'display',
        'button_text',
    ];
}
