<?php

namespace App\Domain\Orders\Models;

use Heritage\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = ['reference', 'amount'];
}
