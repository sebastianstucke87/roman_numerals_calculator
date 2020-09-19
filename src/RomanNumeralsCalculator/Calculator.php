<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator;

use Assert\Assert;

final class Calculator
{
    public function sum(int ...$numbers): int
    {
        Assert::that($numbers)->notEmpty();

        return array_sum($numbers);
    }
}
