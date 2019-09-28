<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function items()
    {
        return $this->hasMany('MenuItem', "menu_id", "id");
    }

}
