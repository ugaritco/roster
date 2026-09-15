<?php

namespace App\Domain\Orders\Models;

use Heritage\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['reference', 'amount'];
}
