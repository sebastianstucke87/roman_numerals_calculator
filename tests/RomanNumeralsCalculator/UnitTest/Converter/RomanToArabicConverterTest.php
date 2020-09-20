<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\UnitTest\Converter;

use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Domain\Converter\RomanToArabicConverter;

final class RomanToArabicConverterTest extends TestCase
{
    /**
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_schema()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_singles()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_tenths()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_hundreds()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_wikipedia_examples()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_arabic_edge_cases()
     */
    public function test_it_can_convert_from_arabic_to_roman_numerals(int $arabic, string $roman): void
    {
        // arrange
        $sut = new RomanToArabicConverter();

        // act
        $result = $sut->convert($arabic);

        // assert
        self::assertEquals($roman, $result);
    }

    /**
     * @todo FIXME
     *
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_vinculum_edge_cases
     */
    public function test_it_can_convert_roman_numerals_bigger_than_3999(int $arabic, string $roman): void
    {
        self::markTestSkipped('"Vinculum"-numbers are currently not supported');

        // arrange
        $sut = new RomanToArabicConverter();

        // act
        $result = $sut->convert($arabic);

        // assert
        self::assertEquals($arabic, $result);
    }
}
