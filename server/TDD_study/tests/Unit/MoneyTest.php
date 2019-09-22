<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Money;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Bank;

class MoneyTest extends TestCase
{
    public function testCurrency()
    {
        $this->assertEquals('USD',Money::dollar(1)->currency());
        $this->assertEquals('CHF',Money::franc(1)->currency());
    }

    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue(Money::dollar(10)->equals($five->times(2)));
        $this->assertTrue(Money::dollar(15)->equals($five->times(3)));
    }

    public function testEquality()
    {
        $dollar = Money::dollar(5);
        $this->assertTrue($dollar->equals(Money::dollar(5)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));

        $franc = Money::franc(5);
        $this->assertTrue($franc->equals(Money::franc(5)));
        $this->assertFalse($franc->equals(Money::franc(6)));

        $this->assertFalse($dollar->equals($franc));
    }

    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $reduced = (new Bank)->reduce($sum,'USD');
        $this->assertEquals($reduced,Money::dollar(10));
    }

}
