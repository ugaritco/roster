<?php

namespace App\Models;

use Heritage\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];
}
