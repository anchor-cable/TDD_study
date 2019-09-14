<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Dollar;
use App\Franc;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10),$five->times(2));
        $this->assertEquals(new Dollar(15),$five->times(3));
    }

    public function testEquality()
    {
        $dollar = new Dollar(5);
        $this->assertTrue($dollar->equals(new Dollar(5)));
        $this->assertFalse($dollar->equals(new Dollar(6)));
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10),$five->times(2));
        $this->assertEquals(new Franc(15),$five->times(3));
    }

//    public function testFrancEquality()
//    {
//        $dollar = new Franc(5);
//        $this->assertTrue($dollar->equals(new Franc(5)));
//        $this->assertFalse($dollar->equals(new Franc(6)));
//    }
}
