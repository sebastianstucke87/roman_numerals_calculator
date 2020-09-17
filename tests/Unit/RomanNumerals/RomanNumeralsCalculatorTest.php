<?php
declare(strict_types=1);

namespace Unit\RomanNumerals;

use LogicException;
use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Calculator;
use RomanNumeralsCalculator\Converter;
use RomanNumeralsCalculator\RomanNumeralsCalculator;

final class RomanNumeralsCalculatorTest extends TestCase
{
    public function test_it_needs_at_least_one_roman_numeral(): void
    {
        // arrange
        $calculator = new Calculator();
        $converter = new Converter();
        $sut = new RomanNumeralsCalculator($calculator, $converter);

        // assert
        $this->expectException(LogicException::class);

        // act
        $sut();
    }

    public function test_it_can_add_up_roman_numerals(): void
    {
        // arrange
        $calculator = new Calculator();
        $converter = new Converter();
        $sut = new RomanNumeralsCalculator($calculator, $converter);

        // act
        $result = $sut('X', 'II', 'V', 'XIV', 'IX', 'I', 'I');

        // assert
        $this->assertEquals(42, $result);
    }
}
