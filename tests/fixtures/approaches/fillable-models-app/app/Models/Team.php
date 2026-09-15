<?php

namespace App\Models;

use Heritage\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'owner_id'];
}
