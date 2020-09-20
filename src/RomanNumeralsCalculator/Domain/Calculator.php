<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Domain;

use Assert\Assert;
use RomanNumeralsCalculator\Domain\Converter\ArabicToRomanConverter;
use RomanNumeralsCalculator\Domain\Converter\RomanToArabicConverter;

final class Calculator
{
    private RomanToArabicConverter $convertToRoman;

    private ArabicToRomanConverter $convertToArabic;

    public function __construct(RomanToArabicConverter $convertToRoman, ArabicToRomanConverter $converterToArabic)
    {
        $this->convertToRoman = $convertToRoman;
        $this->convertToArabic = $converterToArabic;
    }

    public static function create(): self
    {
        return new self(new RomanToArabicConverter(), new ArabicToRomanConverter());
    }

    /**
     * @param string[]
     */
    public function sum(array $romanNumerals): RomanNumeralsResultInterface
    {
        $arabicResult = 0;

        foreach ($romanNumerals as $romanNumeral) {
            $arabicResult += $this->convertToArabic->convert($romanNumeral);
        }

        Assert::that($arabicResult)->range(Constants::ROMAN_MIN, Constants::ROMAN_MAX);
        $romanResult = $this->convertToRoman->convert($arabicResult);
        Assert::that($romanResult)->notEmpty();

        return new RomanNumeralsResultDto($arabicResult, $romanResult);
    }
}
