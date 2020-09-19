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
     * @example: "III" -> 3
     */
    public function toArabic(string $romanNumeral): int
    {
        $romanNumeral = strtolower(trim($romanNumeral));
        $result = [];

        $mbStrSplit = mb_str_split($romanNumeral);
        $totalParts = count($mbStrSplit);

        // "iv" -> 4
        $total = 0;
        for ($i = 0; $i <= ($totalParts - 1); $i++) {
            $currentPart = $mbStrSplit[$i];
            $currentNumber = $this->naiveLookup($currentPart);
            $nextIndex = $i + 1;

            if ($nextIndex <= $totalParts-1) {
                $nextPart = $mbStrSplit[$nextIndex];
                $nextNumber = $this->naiveLookup($nextPart);

                if ($currentNumber < $nextNumber) {
                    $total += $nextNumber - $currentNumber;
                    $i++;

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

    private function naiveLookup($currentPart): int
    {
        Assert::that(self::MAP)->keyExists($currentPart);

        return self::MAP[$currentPart];
    }
}
