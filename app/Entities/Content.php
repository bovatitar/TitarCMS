<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    public function category()
    {
        return $this->hasOne('Category', "id", "category_id");
    }

}
