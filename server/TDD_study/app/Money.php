<?php

namespace App;

class Money{
    protected $amount;

    public function equals(Money $money):bool
    {
        return $this->amount === $money->amount and strcmp(get_class($this),get_class($money))==0;
    }

}
