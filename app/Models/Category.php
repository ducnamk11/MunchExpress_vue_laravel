<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
