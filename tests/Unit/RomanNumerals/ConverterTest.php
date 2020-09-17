<?php
declare(strict_types=1);

namespace Unit\RomanNumerals;

use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Converter;

final class ConverterTest extends TestCase
{
    /**
     * @dataProvider provide_basic_schema
     * @dataProvider provide_basic_singles
     * @dataProvider provide_basic_tenths
     * @dataProvider provide_basic_hundreds
     * @dataProvider provide_wikipedia_examples
     * @dataProvider provide_edge_cases
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
     * @dataProvider provide_basic_schema
     * @dataProvider provide_basic_singles
     * @dataProvider provide_basic_tenths
     * @dataProvider provide_basic_hundreds
     * @dataProvider provide_wikipedia_examples
     * @dataProvider provide_edge_cases
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

    public function provide_basic_schema()
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

    public function provide_basic_singles()
    {
        // array schema: [arabic, roman]
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
        ];
    }

    public function provide_basic_tenths()
    {
        // array schema: [arabic, roman]
        return [
            [11, 'XI'],
            [20, 'XX'],
            [30, 'XXX'],
            [40, 'XL'],
            [50, 'L'],
            [60, 'LX'],
            [70, 'LXX'],
            [80, 'LXXX'],
            [90, 'XC'],
            [100, 'C'],
        ];
    }

    public function provide_basic_hundreds()
    {
        // array schema: [arabic, roman]
        return [
            [200, 'CC'],
            [300, 'CCC'],
            [400, 'CD'],
            [500, 'D'],
            [600, 'DC'],
            [700, 'DCC'],
            [800, 'DCCC'],
            [900, 'CM'],
            [1000, 'M'],
            [1001, 'MI'],
        ];
    }

    /**
     * @see "Standard form": https://en.wikipedia.org/wiki/Roman_numerals
     */
    public function provide_wikipedia_examples()
    {
        // array schema: [arabic, roman]
        return [
            [39, 'XXXIX'],
            [246, 'CCXLVI'],
            [789, 'DCCLXXXIX'],
            [2421, 'MMCDXXI'],
            [160, 'CLX'],
            [207, 'CCVII'],
            [1009, 'MIX'],
            [1066, 'MLXVI'],
            [1776, 'MDCCLXXVI'],
            [1918, 'MCMXVIII'],
            [1954, 'MCMLIV'],
            [2014, 'MMXIV'],
            [90, 'XC'],
            [45, 'XLV'],
            [99, 'XCIX'],
            [18, 'XVIII'],
            [19, 'XIX'],
            [14, 'XIV'],
            [1894, 'MDCCCXCIV'],
            [4, 'IV'],
            [40, 'XL'],
            [400, 'CD'],
            [9, 'VIIII'],
            [90, 'LXXXX'],
            [900, 'DCCCC'],
        ];
    }

    public function provide_edge_cases()
    {
        // array schema: [arabic, roman]
        return [
            [-1, ''],
            [0, ''],
            [1, 'i'],
            [5, 'v'],
            [10, 'x'],
            [50, 'l'],
            [100, 'c'],
            [500, 'd'],
            [1000, 'm'],
        ];
    }
}
