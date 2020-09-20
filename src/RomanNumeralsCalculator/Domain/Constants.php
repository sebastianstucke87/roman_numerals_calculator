<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Domain;

final class Constants
{
    /** @var int */
    public const ROMAN_MIN = 1;

    /** @var int */
    public const ROMAN_MAX = 3999;

    /** @var array */
    public const ROMAN_MAP = [
        'i' => 1,
        'v' => 5,
        'x' => 10,
        'l' => 50,
        'c' => 100,
        'd' => 500,
        'm' => 1000,
    ];

    /** @var array */
    public const ARABIC_MAP = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];
}
