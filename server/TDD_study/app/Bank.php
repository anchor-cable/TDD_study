<?php

namespace App;

use App\Expression;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;
use App\Pair;

class Bank
{
    private $rates = [
        'USDtoCHF' => 2
    ];

    public function reduce(Expression $source, String $to):Expression
    {
        return $source->reduce($this,$to);
    }

    public function addRate(string $from,string $to,int $rate)
    {
        $this->rates = array_merge($this->rates,array($from . 'to' . $to =>$rate));


    }

    public function rate(string $from,string $to)
    {
        if($from === $to){
            return 1;
        }
        $key = $from . 'to' . $to;
        return $this->rates[$key];
    }
}
