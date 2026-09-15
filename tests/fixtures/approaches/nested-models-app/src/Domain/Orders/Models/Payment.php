<?php

namespace App\Domain\Orders\Models;

use Heritage\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['reference', 'amount'];
}
