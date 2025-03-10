<?php

use Bank\TargetDate;
use PHPUnit\Framework\TestCase;

class TargetDateTest extends TestCase
{
    public function test_deposit_date_should_be_on_January_first_2016()
    {
        $interestRate = new TargetDate(100, 101, 0.98);
        $expectedDate = new DateTimeImmutable('2016-01-01');

        $depositDate = $interestRate->getDepositDate();

        self::assertEquals($expectedDate, $depositDate);

    }

    public function test_amount_of_money_should_be_bigger_than_zero()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Amount of money should be bigger than zero');
        new TargetDate(0, 101, 0.98);
    }

    public function test_desired_amount_should_be_bigger_than_amount_of_money()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Desired amount should be bigger than amount of money');
        new TargetDate(100, 99, 0.98);
    }

    public function test_interest_rate_should_be_bigger_than_zero()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Interest rate should be bigger than zero');
        new TargetDate(100, 101, 0);
    }

    public function test_basics()
    {
        $a = new TargetDate(100, 101, 0.98);
        $b = new TargetDate(100, 150, 2);
        $c = new TargetDate(4281, 5087, 2);
        $d = new TargetDate(4620, 5188, 2);
        $e = new TargetDate(9999, 11427, 6);
        $f = new TargetDate(3525, 4822, 3);

        $this->assertSame("2017-01-01", $a->dateNumberDays());
        $this->assertSame("2035-12-26", $b->dateNumberDays());
        $this->assertSame("2024-07-03", $c->dateNumberDays());
        $this->assertSame("2021-09-19", $d->dateNumberDays());
        $this->assertSame("2018-03-13", $e->dateNumberDays());
        $this->assertSame("2026-04-18", $f->dateNumberDays());
    }
}
