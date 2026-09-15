<?php

namespace App\Models;

use Heritage\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'post_id'];
}
