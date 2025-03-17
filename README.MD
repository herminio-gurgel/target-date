# Target Date

This is a coding challenge posted on the [CodeWars](https://www.codewars.com/kata/569218bc919ccba77000000b/php) website.
In addition to completing the challenge, I also implemented unit tests with PHPUnit and mutation tests with Infection to
ensure code quality, using techniques like Test-Driven Development (TDD) and Baby Steps.

## Prerequisites

This project uses [Composer](https://getcomposer.org/) for dependency management, [PHPUnit 9.6](https://phpunit.de/)
for unit testing and [Infection 0.26.6](https://infection.github.io/) for mutation testing with **PHP 7.4** as the
required PHP version with Xdebug, phpdbg, or pcov enabled.

Depending on your PHP version, you may encounter deprecated warnings, but the tests should still run correctly. You can
verify compatibility with the appropriate PHP version
at [PHPUnit Supported Versions](https://phpunit.de/supported-versions.html)
and [Infection Installation](https://infection.github.io/guide/installation.html).

## Getting Started

1. **Clone the repository**:

```bash
git clone https://github.com/herminio-gurgel/target-date
```

2. **Navigate to the project directory**:

```bash
cd target-date
```

3. **Install PHP dependencies**:

```bash
cd composer install
```

4. **Run the unit test suite:**

```bash
composer phpunit
```

5. **Run the mutation test suite:**

```bash
composer infection
```

## Description

You have an amount of money `a0 > 0` and you deposit it with an interest rate of `p percent divided by 360` per day on
the `1st of January 2016`. You want to have an amount `a >= a0`.

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

## **Known Issues**

- One mutant escapes the test, and two others fail due to timeout.
  These errors are false positives caused by the for loop. However, they suggest that a more efficient solution for this
  logic exists.

## **Future Implementations and Fixes**

- Create a Docker image to run everything pre-configured.
- Refactor the for loop logic to use logarithms for better performance.