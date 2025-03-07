<?php

use Bank\InterestRate;
use PHPUnit\Framework\TestCase;

class InterestRateTest extends TestCase
{
    public function test_deposit_date_should_be_on_January_first_2016()
    {
        //Arrange
        $interestRate = new InterestRate(100, 101, 0.98);
        $expectedDate = new DateTimeImmutable('2016-01-01');

        //Act
        $depositDate = $interestRate->getDepositDate();

        //Assert
        self::assertEquals($expectedDate, $depositDate);

    }

    public function test_amount_of_money_should_be_bigger_than_zero()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Amount of money should be bigger than zero');
        new InterestRate(0, 101, 0.98);
    }

    public function test_desired_amount_should_be_bigger_than_amount_of_money()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Desired amount should be bigger than amount of money');
        new InterestRate(100, 99, 0.98);
    }

    public function test_interest_rate_should_be_bigger_than_zero()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Interest rate should be bigger than zero');
        new InterestRate(100, 101, 0);
    }
}
