<?php
declare(strict_types=1);

namespace RomanNumeralsCalculator\UnitTest;

use LogicException;
use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Domain\Calculator;
use RomanNumeralsCalculator\Domain\Converter\ArabicToRomanConverter;
use RomanNumeralsCalculator\Domain\Converter\RomanToArabicConverter;

final class CalculatorTest extends TestCase
{
    public function test_it_can_be_created(): void
    {
        // act
        $sut = Calculator::create();

        // assert
        self::assertInstanceOf(Calculator::class, $sut);
    }

    public function test_it_needs_at_least_one_roman_numeral(): void
    {
        // arrange
        $romanToArabicConverter = new RomanToArabicConverter();
        $arabicToRomanConverter = new ArabicToRomanConverter();
        $sut = new Calculator($romanToArabicConverter, $arabicToRomanConverter);

        // assert
        $this->expectException(LogicException::class);

        // act
        $sut->sum([]);
    }

    /**
     * @dataProvider provide_invalid_numbers
     */
    public function test_it_does_not_return_invalid_numbers_in_result(string $roman): void
    {
        // arrange
        $romanToArabicConverter = new RomanToArabicConverter();
        $arabicToRomanConverter = new ArabicToRomanConverter();
        $sut = new Calculator($romanToArabicConverter, $arabicToRomanConverter);

        // assert
        $this->expectException(LogicException::class);

        // act
        $sut->sum([$roman]);
    }

    public function provide_invalid_numbers(): array
    {
        // array schema: [roman]
        return [
            'invalid roman numeral ""' => [''],
        ];
    }

    public function test_it_can_add_up_roman_numerals(): void
    {
        // arrange
        $romanToArabicConverter = new RomanToArabicConverter();
        $arabicToRomanConverter = new ArabicToRomanConverter();
        $sut = new Calculator($romanToArabicConverter, $arabicToRomanConverter);

        // act
        $result = $sut->sum(['X', 'II', 'V', 'XIV', 'IX', 'I', 'I']);

        // assert
        self::assertEquals(42, $result->arabicNumeral());
        self::assertEquals('XLII', $result->romanNumeral());
    }

    public function test_it_can_calculate_the_highest_roman_numeral(): void
    {
        // arrange
        $romanToArabicConverter = new RomanToArabicConverter();
        $arabicToRomanConverter = new ArabicToRomanConverter();
        $sut = new Calculator($romanToArabicConverter, $arabicToRomanConverter);

        // act
        $result = $sut->sum(['MMMCMXCVIII', 'I']);

        // assert
        self::assertEquals(3_999, $result->arabicNumeral());
        self::assertEquals('MMMCMXCIX', $result->romanNumeral());
    }
}
