<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\Domain\Converter;

use Assert\Assert;
use RomanNumeralsCalculator\Domain\Constants;

final class ArabicToRomanConverter
{
    /**
     * @example:
     *     - "III" -> 3
     *     - "II I" -> 3
     */
    public function convert(string $romanNumeral): int
    {
        $trim = preg_replace('/\s+/', '', $romanNumeral);
        $lowerCase = strtolower($trim);
        $partsAsArray = str_split($lowerCase);
        $totalParts = count($partsAsArray);

        return $this->process($totalParts, $partsAsArray);
    }

    private function process(int $totalParts, array $parts): int
    {
        $result = 0;

        for ($i = 0; $i <= ($totalParts - 1); $i++) {
            $currentPart = $parts[$i];
            $currentNumber = $this->map($currentPart);
            $nextIndex = $i + 1;

            // Is there a next part after the current part?
            if ($nextIndex > $totalParts - 1) {
                $result += $currentNumber;

                continue;
            }

            $nextPart = $parts[$nextIndex];
            $nextNumber = $this->map($nextPart);

            // Is the current number smaller than the next number?
            if ($currentNumber >= $nextNumber) {
                $result += $currentNumber;

                continue;
            }

            // Example "IV -> 4": The parts are "1" and "5", the check "1 < 5" yields true, resulting in "5 - 1 = 4".
            $result += $nextNumber - $currentNumber;

            // Modify outer-scope index to skip the next iteration b/c the nextNumber has already been processed.
            $i++;
        }

        return $result;
    }

    private function map(string $romanNumeral): int
    {
        Assert::that(Constants::ROMAN_MAP)->keyExists($romanNumeral);

        return Constants::ROMAN_MAP[$romanNumeral];
    }
}
