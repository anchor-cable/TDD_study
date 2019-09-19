<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Money;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Dollar;
use App\Franc;

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
        $this->assertEquals(Money::dollar(10),$five->times(2));
        $this->assertEquals(Money::dollar(15),$five->times(3));
    }

    /**
     *
     */
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

    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10),$five->times(2));
        $this->assertEquals(Money::franc(15),$five->times(3));
    }
}
