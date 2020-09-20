# FEATURE

## "Vinculum"-Numbers
Add support for big numbers (`4000` to `3,999,999`) by adding a separator (`_`) between 
the first, and the second part of the roman numeral:

`<FIRST-PART>_<LAST-PART>`

**Example:**

| New Roman (feature) | Arabic | Current Roman (ambiguous) |
| --- | --- | --- |
| `IV` | 4 | IV |
| `_IV` | 4 | IV |
| `IV_` | 4,000 | IV |
| `MMMCMXCIX` | 3,999 | MMMCMXCIX |
| `_MMMCMXCIX` | 3,999 | MMMCMXCIX |
| `MMMCMXCIX_` | 3,999,000 | MMMCMXCIX |
| `MMMCMXCIX_CMXCIX` | 3,999,999 | MMMCMXCIXCMXCIX |
| n/a | 4,000,000 | n/a |
