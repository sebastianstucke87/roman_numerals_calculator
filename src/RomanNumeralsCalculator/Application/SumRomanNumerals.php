<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Application;

use RomanNumeralsCalculator\Domain\Calculator;
use RomanNumeralsCalculator\Domain\RomanNumeralsResultInterface;

final class SumRomanNumerals implements SumRomanNumeralsInterface
{
    private Calculator $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public static function create(): self
    {
        return new self(Calculator::create());
    }

    /**
     * @example: "MCCXCV" + "xlii" -> "MCCCXXXVII (1337)"
     */
    public function execute(string ...$romanNumerals): RomanNumeralsResultInterface
    {
        return $this->calculator->sum($romanNumerals);
    }
}
