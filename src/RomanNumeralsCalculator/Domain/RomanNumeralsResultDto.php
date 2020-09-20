<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Domain;

final class RomanNumeralsResultDto implements RomanNumeralsResultInterface
{
    private int $arabic;

    private string $roman;

    public function __construct(int $arabic, string $roman)
    {
        $this->arabic = $arabic;
        $this->roman = $roman;
    }

    public function arabicNumeral(): int
    {
        return $this->arabic;
    }

    public function romanNumeral(): string
    {
        return $this->roman;
    }
}
