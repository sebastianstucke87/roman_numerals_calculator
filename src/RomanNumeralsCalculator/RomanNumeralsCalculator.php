<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator;

final class RomanNumeralsCalculator
{
    private Calculator $calculator;

    private Converter $converter;

    public function __construct(Calculator $calculator, Converter $converter)
    {
        $this->calculator = $calculator;
        $this->converter = $converter;
    }

    public function __invoke(string ...$romanNumerals): int
    {
        // NOP
    }
}
