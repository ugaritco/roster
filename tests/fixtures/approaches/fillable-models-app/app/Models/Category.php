<?php

namespace App\Models;

use Heritage\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
}
