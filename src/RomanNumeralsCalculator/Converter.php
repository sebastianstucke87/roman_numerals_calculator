<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator;

use Assert\Assert;
use function Safe\mb_str_split;

final class Converter
{
    /** @var array */
    private const MAP = [
        'i' => 1,
        'v' => 5,
        'x' => 10,
        'l' => 50,
        'c' => 100,
        'd' => 500,
        'm' => 1000,
    ];

    /**
     * @example:
     *     - "III" -> 3
     *     - "II I" -> 3
     */
    public function toArabic(string $romanNumeral): int
    {
        $trim = preg_replace('/\s+/', '', $romanNumeral);
        $lower = strtolower($trim);
        $parts = mb_str_split($lower);
        $totalParts = count($parts);

        $result = 0;
        for ($i = 0; $i <= ($totalParts - 1); $i++) {
            $currentPart = $parts[$i];
            $currentNumber = $this->naiveLookup($currentPart);
            $nextIndex = $i + 1;

            // Is there a next part after the current part?
            if ($nextIndex <= $totalParts - 1) {
                $nextPart = $parts[$nextIndex];
                $nextNumber = $this->naiveLookup($nextPart);

                // Is the current number smaller than the next number?
                if ($currentNumber < $nextNumber) {
                    // Example "IV -> 4": Parts are "1" and "5". The check "1 < 5" yield true, resulting in "5 - 1 = 4".
                    $result += $nextNumber - $currentNumber;
                    // Modify outer-scope index to skip the next iteration b/c the nextNumber has already been processed.
                    $i++;

                    continue;
                }
            }

            $result += $currentNumber;
        }

        return $result;
    }

    /**
     * @todo sebs: implement
     */
    public function toRoman(int $arabic): string
    {
        // NOP
    }

    private function naiveLookup(string $romanNumeral): int
    {
        Assert::that(self::MAP)->keyExists($romanNumeral);

        return self::MAP[$romanNumeral];
    }
}
