<?php

namespace App\Domain\Orders\Models;

use Heritage\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = ['reference', 'amount'];
}
