<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_builder extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'menu_title',
        'menu_desc',
    ];
    // $test::findOrFail(61)->children
    // zwraca mi wszystkie strony od id szukanego
    public function children(){
        return $this->hasMany('App\Menu_items', 'menu_id');
    }

    // to samo mogę zrobić na fajarwerkach ! 
    // odwołam się do relacji ona zwróci mi wszystko a potem zrobię where na tym!
}   