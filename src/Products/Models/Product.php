<?php

namespace Domain\Products\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public $stock = 100;

    public $price = 10.00;
}
