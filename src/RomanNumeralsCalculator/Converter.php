<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator;

use function Safe\mb_str_split;

final class Converter
{
    /**
     * @example: "III" -> 3
     */
    public function toArabic(string $romanNumeral): int
    {
        $romanNumeral = strtolower(trim($romanNumeral));

        $map = [
            'i' => 1,
            'v' => 5,
            'x' => 10,
            'l' => 50,
            'c' => 100,
            'd' => 500,
            'm' => 1000,
        ];

        $result = [];

        $romanNumeralsAsArray = mb_str_split($romanNumeral);

        foreach ($romanNumeralsAsArray as $index => $currentPart) {

            if (!array_key_exists($currentPart, $map)) {
                // NOOP
            }

            $result[] = $map[$currentPart];

        }

        $total = 0;
        $totalParts = count($result);
        $skip = false;
        foreach ($result as $index => $currentNumber) {

            if ($skip) {
                $skip = false;
                continue;
            }

            $nextIndex = $index + 1;
            if ($nextIndex <= $totalParts-1) {
                $nextNumber = $result[$nextIndex];

                if ($currentNumber < $nextNumber) {
                    $total += $nextNumber - $currentNumber;
                    $skip = true;

                    continue;
                }
            }

            $total += $currentNumber;
        }

        return $total;
    }

    /**
     * @todo sebs: implement
     */
    public function toRoman(int $arabic): string
    {
        // NOP
    }
}
