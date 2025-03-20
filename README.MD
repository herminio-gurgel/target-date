![Docker Ready](https://img.shields.io/badge/docker-ready-blue)
![PHP Version](https://img.shields.io/badge/php-7.4-blue)

# Target Date

This is a coding challenge posted on the [CodeWars](https://www.codewars.com/kata/569218bc919ccba77000000b/php)
website.  
In addition to completing the challenge, I also implemented unit tests with PHPUnit and mutation tests with Infection to
ensure code quality, using techniques like Test-Driven Development (TDD) and Baby Steps.

I've also added a **Dockerfile** pre-configured with everything necessary to run the project seamlessly, including PHP,
Composer, PHPUnit, and Infection.

## Prerequisites

For easier setup, a **Dockerfile** is provided, pre-configured with **PHP 7.4.33**, [Composer](https://getcomposer.org/)
, and the necessary extensions like **Xdebug**. This ensures the environment is consistent and ready to run tests
without manual configuration.

## Getting Started

1. **Clone the repository**:

```bash
git clone https://github.com/herminio-gurgel/target-date
```

2. **Navigate to the project directory**:

```bash
cd target-date
```

3. Build the Docker image:

```bash
docker build -t target-date .
```

4. Run the Docker container with interactive mode and volume mounting:

```bash
docker run -v $(pwd):/app/ -it target-date bash
```

5. Install project dependencies with Composer:

```bash
composer install
```

6. Run unit tests with PHPUnit:

```bash
composer phpunit
```

7. Run mutation tests with Infection:

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
  These cases stem from the current loop implementation. A future refactor using logarithmic calculations should improve
  performance and fix these cases.

## **Future Implementations and Fixes**

- Refactor the for loop logic to use logarithms for better logic and performance.