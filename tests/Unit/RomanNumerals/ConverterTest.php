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
     * @dataProvider provide_roman_edge_cases
     */
    public function test_it_can_convert_from_roman_to_arabic_numerals(int $arabic, string $roman): void
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
     * @dataProvider provide_arabic_edge_cases
     */
    public function test_it_can_convert_from_arabic_to_roman_numerals(int $arabic, string $roman): void
    {
        // arrange
        $sut = new Converter();

        // act
        $result = $sut->toRoman($arabic);

        // assert
        $this->assertEquals($roman, $result);
    }

    public function provide_basic_schema(): array
    {
        // array schema: [arabic, roman]
        return [
            "1 - I" => [1, 'I'],
            "5 - V" => [5, 'V'],
            "10 - X" => [10, 'X'],
            "50 - L" => [50, 'L'],
            "100 - C" => [100, 'C'],
            "500 - D" => [500, 'D'],
            "1000 - M" => [1000, 'M'],
        ];
    }

    public function provide_basic_singles(): array
    {
        // array schema: [arabic, roman]
        return [
            '1 - I' => [1, 'I'],
            '2 - II' => [2, 'II'],
            '3 - III' => [3, 'III'],
            '4 - IV' => [4, 'IV'],
            '5 - V' => [5, 'V'],
            '6 - VI' => [6, 'VI'],
            '7 - VII' => [7, 'VII'],
            '8 - VIII' => [8, 'VIII'],
            '9 - IX' => [9, 'IX'],
            '10 - X' => [10, 'X'],
        ];
    }

    public function provide_basic_tenths(): array
    {
        // array schema: [arabic, roman]
        return [
            '11 - XI' => [11, 'XI'],
            '20 - XX' => [20, 'XX'],
            '30 - XXX' => [30, 'XXX'],
            '40 - XL' => [40, 'XL'],
            '50 - L' => [50, 'L'],
            '60 - LX' => [60, 'LX'],
            '70 - LXX' => [70, 'LXX'],
            '80 - LXXX' => [80, 'LXXX'],
            '90 - XC' => [90, 'XC'],
            '100 - C' => [100, 'C'],
        ];
    }

    public function provide_basic_hundreds(): array
    {
        // array schema: [arabic, roman]
        return [
            '200 - CC' => [200, 'CC'],
            '300 - CCC' => [300, 'CCC'],
            '400 - CD' => [400, 'CD'],
            '500 - D' => [500, 'D'],
            '600 - DC' => [600, 'DC'],
            '700 - DCC' => [700, 'DCC'],
            '800 - DCCC' => [800, 'DCCC'],
            '900 - CM' => [900, 'CM'],
            '1000 - M' => [1000, 'M'],
            '1001 -  MI' => [1001, 'MI'],
        ];
    }

    /**
     * @see "Standard form": https://en.wikipedia.org/wiki/Roman_numerals
     */
    public function provide_wikipedia_examples(): array
    {
        // array schema: [arabic, roman]
        return [
            '4 - IV' => [4, 'IV'],
            '9 - VIIII' => [9, 'VIIII'],
            '14 - XIV' => [14, 'XIV'],
            '18 - XVIII' => [18, 'XVIII'],
            '19 - XIX' => [19, 'XIX'],
            '39 - XXXIX' => [39, 'XXXIX'],
            '40 - XL' => [40, 'XL'],
            '45 - XLV' => [45, 'XLV'],
            '90 - LXXXX' => [90, 'LXXXX'],
            '90 - XC' => [90, 'XC'],
            '99 - XCIX' => [99, 'XCIX'],
            '160 - CLX' => [160, 'CLX'],
            '207 - CCVII' => [207, 'CCVII'],
            '246 - CCXLVI' => [246, 'CCXLVI'],
            '400 - CD' => [400, 'CD'],
            '789 - DCCLXXXIX' => [789, 'DCCLXXXIX'],
            '900 - DCCCC' => [900, 'DCCCC'],
            '1009 - MIX' => [1009, 'MIX'],
            '1066 - MLXVI' => [1066, 'MLXVI'],
            '1776 - MDCCLXXVI' => [1776, 'MDCCLXXVI'],
            '1894 - MDCCCXCIV' => [1894, 'MDCCCXCIV'],
            '1918 - MCMXVIII' => [1918, 'MCMXVIII'],
            '1954 - MCMLIV' => [1954, 'MCMLIV'],
            '2014 - MMXIV' => [2014, 'MMXIV'],
            '2421 - MMCDXXI' => [2421, 'MMCDXXI'],
        ];
    }

    public function provide_arabic_edge_cases(): array
    {
        // array schema: [arabic, roman]
        return [
            '-1 - ""' => [-1, ''],
            '0 - ""' => [0, ''],
        ];
    }

    public function provide_roman_edge_cases()
    {
        // array schema: [arabic, roman]
        return [
            '1 - i' => [1, 'i'],
            '5 - v' => [5, 'v'],
            '10 - x' => [10, 'x'],
            '50 - l' => [50, 'l'],
            '100 - c' => [100, 'c'],
            '500 - d' => [500, 'd'],
            '1000 - m' => [1000, 'm'],
        ];
    }
}
