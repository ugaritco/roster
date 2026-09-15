<?php

namespace App\Domain\Orders\Models;

use Heritage\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['reference', 'amount'];
}
