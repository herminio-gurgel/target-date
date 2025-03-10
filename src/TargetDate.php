<?php

namespace Bank;

use DateTimeImmutable;

class TargetDate
{
    private static $depositDate;
    private $amountMoney;
    private $interestRate;
    private $desiredAmount;

    /**
     * @param $amountMoney
     * @param $desiredAmount
     * @param $interestRate
     */
    public function __construct($amountMoney, $desiredAmount, $interestRate)
    {
        self::$depositDate = new DateTimeImmutable('2016-01-01');
        $this->amountMoney = $amountMoney;
        $this->desiredAmount = $desiredAmount;
        $this->interestRate = $interestRate;

        if ($amountMoney <= 0) {
            throw new \DomainException('Amount of money should be bigger than zero');
        }

        if ($amountMoney > $desiredAmount) {
            throw new \DomainException('Desired amount should be bigger than amount of money');
        }

        if ($interestRate <= 0) {
            throw new \DomainException('Interest rate should be bigger than zero');
        }

    }

    /**
     * @return DateTimeImmutable
     */
    public static function getDepositDate()
    {
        return self::$depositDate;
    }

    public function dateNumberDays()
    {
        $currentAmount = $this->amountMoney;

        for ($numberDays = 0; $currentAmount < $this->desiredAmount; $numberDays++) {
            $currentAmount += ($currentAmount * $this->interestRate) / 36000;
        }

        return date('Y-m-d', strtotime('2016-01-01' . '+ ' . $numberDays . ' ' . 'days'));
    }

}