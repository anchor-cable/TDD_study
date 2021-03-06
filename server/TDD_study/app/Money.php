<?php

namespace App;

use App\Expression;

class Money implements Expression
{
    public $amount;
    public $currency;

    public function __construct(int $amount, String $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $money):bool
    {
        return $this->amount === $money->amount and strcmp($this->currency(),$money->currency())==0;
    }

    static function dollar(int $amount):Money
    {
        return new Money($amount,'USD');
    }

    static function franc(int $amount):Money
    {
        return new Money($amount,'CHF');
    }

    public function currency(): String
    {
        return $this->currency;
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier,$this->currency);
    }

    public function plus(Money $addend):Expression
    {
        return new Sum($this,$addend);
    }

    public function reduce(Bank $bank, String $to):Expression
    {
        $rate = $bank->rate($this->currency,$to);
        return new Money($this->amount / $rate,$to);
    }
}
