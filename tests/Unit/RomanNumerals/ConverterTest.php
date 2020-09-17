<?php
declare(strict_types=1);

namespace Unit\RomanNumerals;

use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Converter;

final class ConverterTest extends TestCase
{
    /**
     * @dataProvider provide_numerals
     */
    public function test_it_can_convert_from_roman_to_arabic_numerals(int $arabic, string $roman)
    {
        // arrange
        $sut = new Converter();

        // act
        $result = $sut->toArabic($roman);

        // assert
        $this->assertEquals($arabic, $result);
    }

    /**
     * @dataProvider provide_numerals
     */
    public function test_it_can_convert_from_arabic_to_roman_numerals(int $arabic, string $roman)
    {
        // arrange
        $sut = new Converter();

        // act
        $result = $sut->toRoman($arabic);

        // assert
        $this->assertEquals($roman, $result);
    }

    public function provide_numerals()
    {
        // array schema: [arabic, roman]
        return [
            [1, 'I'],
            [5, 'V'],
            [10, 'X'],
            [50, 'L'],
            [100, 'C'],
            [500, 'D'],
            [1000, 'M'],
        ];
    }
}
