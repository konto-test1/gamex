<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'name',  
        'title',  
        'url',  
        'menu_id',  
        'parent',  
        'order',  
    ];
}
