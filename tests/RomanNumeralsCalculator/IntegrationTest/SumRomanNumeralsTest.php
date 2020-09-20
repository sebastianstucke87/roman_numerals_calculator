<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\IntegrationTest;

use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Application\SumRomanNumerals;

final class SumRomanNumeralsTest extends TestCase
{
    public function test_it_can_sum_roman_numerals()
    {
        // arrange
        $sut = SumRomanNumerals::create();

        // act
        $result = $sut->execute('MCCXCV', 'xlii');

        // assert
        self::assertEquals('MCCCXXXVII', $result->romanNumeral());
        self::assertEquals(1337, $result->arabicNumeral());
    }
}
