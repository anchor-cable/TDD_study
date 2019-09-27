<?php

namespace App;

class Pair{
    private $from;
    private $to;

    public function __construct(String $from,String $to)
    {
        $this->$from = $from;
        $this->to = $to;
    }

    public function equals(Pair $pair):bool
    {
        return $this->from === $pair->from and $this->to === $pair->to;
    }

    public function hashCode()
    {
        return 0;
    }
}
