<?php

namespace App\Models;

use Heritage\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];
}
