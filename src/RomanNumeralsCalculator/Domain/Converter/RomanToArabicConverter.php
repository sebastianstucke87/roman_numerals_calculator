<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Domain\Converter;

use RomanNumeralsCalculator\Domain\Constants;

final class RomanToArabicConverter
{
    /**
     * @example: 3 -> "III"
     */
    public function convert(int $arabic): string
    {
        return $this->process($arabic, '');
    }

    private function process(int $currentNumber, string $result): string
    {
        foreach (Constants::ARABIC_MAP as $romanNumeral => $arabicNumeral) {
            // Does the currentNumber exist in the process?
            if (($currentNumber / $arabicNumeral) < 1) {
                // CurrentNumber does not match.
                continue;
            }

            $currentNumber -= $arabicNumeral;
            $result .= $romanNumeral;

            // Exact match found.
            if ($currentNumber === 0) {
                return $result;
            }

            // Recursive call with remainder.
            return $this->process($currentNumber, $result);
        }

        return $result;
    }
}
