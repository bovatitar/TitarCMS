<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function items()
    {
        return $this->hasMany('Content', "category_id", "id");
    }

}
