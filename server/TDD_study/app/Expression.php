<?php

namespace App;

interface Expression{
    function reduce(Bank $bank,String $to):Expression;

}
