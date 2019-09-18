<?php

namespace App;

abstract class Money{
    protected $amount;
    abstract function times(int $multiplier);

    public function equals(Money $money):bool
    {
        return $this->amount === $money->amount and strcmp(get_class($this),get_class($money))==0;
    }

    static function dollar(int $amount):Money
    {
        return new Dollar($amount);
    }

    static function franc(int $amount):Money
    {
        return new Franc($amount);
    }

}
