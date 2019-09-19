<?php

namespace App;

abstract class Money{
    protected $amount;
    protected $currency;
    abstract function times(int $multiplier):Money;

    public function __construct(int $amount, String $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;

    }

    public function equals(Money $money):bool
    {
        return $this->amount === $money->amount and strcmp(get_class($this),get_class($money))==0;
    }

    static function dollar(int $amount):Money
    {
        return new Dollar($amount,'USD');
    }

    static function franc(int $amount):Money
    {
        return new Franc($amount,'CHF');
    }

    public function currency(): String
    {
        return $this->currency;
    }

}
