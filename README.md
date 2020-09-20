# ROMAN NUMERALS CALCULATOR
A basic calculator for roman numerals from `I (1)` to `MMMCMXCIX (3999)`.

## Usage
```php
use RomanNumeralsCalculator\Application\SumRomanNumerals;

$calc = SumRomanNumerals::create();
$result = $calc->execute('XIX', 'xxiii'); // 19 + 23

$result->arabicNumeral(); // 42
$result->romanNumeral(); // "XLII"


// Any number of arguments can be passed in
$anotherResult = $calc->execute('I', 'II', 'III', 'IV', 'V', ...);
```

## Limitations
"Vinculum"-numbers (> 3999) are currently **not** supported.

## More Info
- [Wikipedia "Roman_numerals"](https://en.wikipedia.org/w/index.php?title=Roman_numerals&oldid=978928568)
- ["Roman numerals" cheat sheet](https://www.onlinemathlearning.com/image-files/roman-numerals-1-1000.png)
- ["Vinculum"-numbers](https://www.romannumerals.org/blog/which-is-the-biggest-number-in-roman-numerals-6)
- [Full fledged "Roman Numeral Converter"](https://www.calculatorsoup.com/calculators/conversions/roman-numeral-converter.php)
