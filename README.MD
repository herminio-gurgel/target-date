# Target Date

This is a coding challenge posted on the [CodeWars](https://www.codewars.com/kata/569218bc919ccba77000000b/php) website.
In addition to completing the challenge, I also implemented unit tests with PHPUnit to ensure code quality, using
techniques like Test-Driven Development (TDD) and Baby Steps.

## Description

You have an amount of money `a0 > 0` and you deposit it with an interest rate of `p percent divided by 360` per day on
the `1st of January 2016`. You want to have an amount `a >= a0`.

## Prerequisites

This project uses [Composer](https://getcomposer.org/) for dependency management and [PHPUnit 9.6](https://phpunit.de/) for testing, with **PHP 7.4** as the required PHP version.

Depending on your PHP version, you may encounter deprecated warnings, but the tests should still run correctly. You can verify compatibility with the appropriate PHP version at [PHPUnit Supported Versions](https://phpunit.de/supported-versions.html).


## **Task:**

The function `date_nb_days` (or dateNbDays...) with parameters `a0, a, p` will return, as a string, the date on which
you have just reached `a`.

## **Example:**

`date_nb_days(100, 101, 0.98) --> "2017-01-01" (366 days)`

`date_nb_days(100, 150, 2.00) --> "2035-12-26" (7299 days)`

## **Notes:**

- The return format of the date is `"YYYY-MM-DD"`
- The deposit is always on the `"2016-01-01"`
- Don't forget to take the rate for a day to be p divided by 36000 since banks consider that there are `360` days in a
  year.
- You have: `a0 > 0, p% > 0, a >= a0`