<?php
declare(strict_types=1);

namespace Unit\RomanNumerals;

use LogicException;
use PHPUnit\Framework\TestCase;
use RomanNumeralsCalculator\Calculator;

final class CalculatorTest extends TestCase
{
    public function test_it_needs_at_least_one_number(): void
    {
        // arrange
        $sut = new Calculator();

        // assert
        $this->expectException(LogicException::class);

        // act
        $sut->sum();
    }

    public function test_it_can_add_one_number(): void
    {
        // arrange
        $sut = new Calculator();

        // act
        $result = $sut->sum(1);

        // assert
        $this->assertEquals(1, $result);
    }

    public function test_it_can_add_multiple_numbers(): void
    {
        // arrange
        $sut = new Calculator();

        // act
        $result = $sut->sum(1, 2, 3, -4, 40);

        // assert
        $this->assertEquals(42, $result);
    }
}
