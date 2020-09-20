<?php

namespace RomanNumeralsCalculator\Domain;

interface RomanNumeralsResultInterface
{
    public function arabicNumeral(): int;

    public function romanNumeral(): string;
}
