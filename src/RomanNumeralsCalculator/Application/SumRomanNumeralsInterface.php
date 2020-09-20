<?php

namespace RomanNumeralsCalculator\Application;

use RomanNumeralsCalculator\Domain\RomanNumeralsResultInterface;

interface SumRomanNumeralsInterface
{
    /**
     * @example: "MCCXCV" + "xlii" -> "MCCCXXXVII (1337)"
     */
    public function execute(string ...$romanNumerals): RomanNumeralsResultInterface;
}
