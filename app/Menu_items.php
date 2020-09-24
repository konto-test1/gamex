<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_items extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'hide_menu',
        'page_id',
        'page_name',
        'page_title',
        'page_parent',
        'parents_items',
        'page_number',
    ];
}
