<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\UnitTest;

/**
 * Array schema: "[arabic, roman]"
 */
final class TestCases
{
    public static function provide_basic_schema(): array
    {
        return [
            "1 - I" => [1, 'I'],
            "5 - V" => [5, 'V'],
            "10 - X" => [10, 'X'],
            "50 - L" => [50, 'L'],
            "100 - C" => [100, 'C'],
            "500 - D" => [500, 'D'],
            "1000 - M" => [1_000, 'M'],
        ];
    }

    public static function provide_basic_singles(): array
    {
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

    public static function provide_basic_tenths(): array
    {
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
        ];
    }

    public static function provide_basic_hundreds(): array
    {
        return [
            '100 - C' => [100, 'C'],
            '200 - CC' => [200, 'CC'],
            '300 - CCC' => [300, 'CCC'],
            '400 - CD' => [400, 'CD'],
            '500 - D' => [500, 'D'],
            '600 - DC' => [600, 'DC'],
            '700 - DCC' => [700, 'DCC'],
            '800 - DCCC' => [800, 'DCCC'],
            '900 - CM' => [900, 'CM'],
            '1000 - M' => [1_000, 'M'],
            '1001 -  MI' => [1_001, 'MI'],
        ];
    }

    /**
     * @see "Standard form": https://en.wikipedia.org/wiki/Roman_numerals
     */
    public static function provide_wikipedia_examples(): array
    {
        return [
            '4 - IV' => [4, 'IV'],
            '14 - XIV' => [14, 'XIV'],
            '18 - XVIII' => [18, 'XVIII'],
            '19 - XIX' => [19, 'XIX'],
            '39 - XXXIX' => [39, 'XXXIX'],
            '40 - XL' => [40, 'XL'],
            '45 - XLV' => [45, 'XLV'],
            '90 - XC' => [90, 'XC'],
            '99 - XCIX' => [99, 'XCIX'],
            '160 - CLX' => [160, 'CLX'],
            '207 - CCVII' => [207, 'CCVII'],
            '246 - CCXLVI' => [246, 'CCXLVI'],
            '400 - CD' => [400, 'CD'],
            '789 - DCCLXXXIX' => [789, 'DCCLXXXIX'],
            '1009 - MIX' => [1_009, 'MIX'],
            '1066 - MLXVI' => [1_066, 'MLXVI'],
            '1776 - MDCCLXXVI' => [1_776, 'MDCCLXXVI'],
            '1894 - MDCCCXCIV' => [1_894, 'MDCCCXCIV'],
            '1918 - MCMXVIII' => [1_918, 'MCMXVIII'],
            '1954 - MCMLIV' => [1_954, 'MCMLIV'],
            '2014 - MMXIV' => [2_014, 'MMXIV'],
            '2421 - MMCDXXI' => [2_421, 'MMCDXXI'],
            '3999 - MMMCMXCIX' => [3_999, 'MMMCMXCIX'],
        ];
    }

    public static function provide_vinculum_edge_cases(): array
    {
        return [
            '3999999 - MMMCMXCIXCMXCIX' => [3_999_999, 'MMMCMXCIXCMXCIX'],
        ];
    }

    public static function provide_arabic_edge_cases(): array
    {
        return [
            '-1 - ""' => [-1, ''],
            '0 - ""' => [0, ''],
        ];
    }

    public static function provide_roman_edge_cases()
    {
        return [
            '1 - i' => [1, 'i'],
            '5 - v' => [5, 'v'],
            '10 - x' => [10, 'x'],
            '50 - l' => [50, 'l'],
            '100 - c' => [100, 'c'],
            '500 - d' => [500, 'd'],
            '1000 - m' => [1_000, 'm'],
            '3 - "II I"' => [3, 'II I'],
            '3 - " II I  "' => [3, ' II I  '],
            '9 - VIIII' => [9, 'VIIII'],
            '90 - LXXXX' => [90, 'LXXXX'],
            '900 - DCCCC' => [900, 'DCCCC'],
        ];
    }
}
