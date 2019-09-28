<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_item';

    public function menu()
    {
        return $this->hasOne('Menu', "id", "menu_id");
    }

}
