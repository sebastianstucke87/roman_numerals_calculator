<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\UnitTest\Converter;

use LogicException;
use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Domain\Converter\ArabicToRomanConverter;

final class ArabicToRomanConverterTest extends TestCase
{
    public function test_it_does_not_convert_invalid_roman_numerals(): void
    {
        // arrange
        $sut = new ArabicToRomanConverter();

        // assert
        $this->expectException(LogicException::class);

        // act
        $sut->convert('a');
    }

    /**
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_schema()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_singles()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_tenths()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_basic_hundreds()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_wikipedia_examples()
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_roman_edge_cases()
     */
    public function test_it_can_convert_from_roman_to_arabic_numerals(int $arabic, string $roman): void
    {
        // arrange
        $sut = new ArabicToRomanConverter();

        // act
        $result = $sut->convert($roman);

        // assert
        self::assertEquals($arabic, $result);
    }

    /**
     * @todo FIXME
     *
     * @dataProvider \RomanNumeralsCalculator\UnitTest\TestCases::provide_vinculum_edge_cases
     */
    public function test_it_can_convert_arabic_numerals_bigger_than_3999(int $arabic, string $roman): void
    {
        self::markTestSkipped('"Vinculum"-numbers are currently not supported');

        // arrange
        $sut = new ArabicToRomanConverter();

        // act
        $result = $sut->convert($roman);

        // assert
        self::assertEquals($arabic, $result);
    }
}
