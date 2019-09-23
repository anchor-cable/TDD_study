<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Money;
use App\Sum;
use Tests\TestCase;
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

//以下は13章で実装するテストだが、キャストができないため動かない。一旦、実装を先に進めるためスキップする。
//このテスト自体、内部実装に深く関係したテストであり、外部から見たふるまいのテストになっていない。
//我々は外部から見たふるまいでテストを書かなければいけない。
//    public function testPlusReturnsSum()
//    {
//        $five = Money::dollar(5);
//        $result = $five->plus($five);
//        $sum = (Sum)$five;//動かない
//        $this->assertEquals($five,$sum->augend);
//        $this->assertEquals($five,$sum->addend);
//    }

    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3),Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum,'USD');
        $this->assertTrue($result->equals(Money::dollar(7)));
    }
}
