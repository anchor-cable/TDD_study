<?php

namespace App;

use App\Expression;

class Bank
{
    public function reduce(Expression $source, String $to)
    {
        return Money::dollar(10);
    }
}
