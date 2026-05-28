<?php

// ============================================================
// DATE & TIME IN PHP
// ============================================================
// PHP works with Unix timestamps — number of seconds since
// January 1, 1970 00:00:00 UTC (the Unix Epoch)


// ============================================================
// time() — CURRENT UNIX TIMESTAMP
// ============================================================

$currentTime = time(); // returns current time as a Unix timestamp
echo $currentTime . '<br />';


// ============================================================
// TIMESTAMP ARITHMETIC
// ============================================================
// Since timestamps are just integers (seconds), you can add/subtract
// time by multiplying: days * hours * minutes * seconds

echo $currentTime + 5 * 24 * 60 * 60 . '<br />'; // 5 days from now
echo $currentTime - 60 * 60 * 24      . '<br />'; // yesterday


// ============================================================
// date() — FORMAT A TIMESTAMP
// ============================================================
// date(format, timestamp) — timestamp defaults to time() if omitted
//
// Common format characters:
//   d  → day with leading zero (01-31)
//   m  → month with leading zero (01-12)
//   Y  → 4-digit year
//   g  → 12-hour format without leading zero
//   i  → minutes with leading zero
//   a  → am/pm lowercase

echo date('d-m-Y g:ia')                                    . '<br />'; // current date & time
echo date('d-m-Y', $currentTime + 5 * 24 * 60 * 60)       . '<br />'; // 5 days from now
echo date('d-m-Y', $currentTime - 60 * 60 * 24)           . '<br />'; // yesterday


// ============================================================
// TIMEZONES
// ============================================================

echo date_default_timezone_get() . '<br />'; // get current timezone

date_default_timezone_set('Europe/Paris'); // set timezone for the script

echo date('d-m-Y g:ia')                                    . '<br />'; // now in Paris time
echo date('d-m-Y', $currentTime + 5 * 24 * 60 * 60)       . '<br />'; // 5 days from now
echo date('d-m-Y', $currentTime - 60 * 60 * 24)           . '<br />'; // yesterday
echo date_default_timezone_get()                           . '<br />'; // Europe/Paris


// ============================================================
// mktime() — CREATE A TIMESTAMP FROM SPECIFIC VALUES
// ============================================================
// mktime(hour, minute, second, month, day, year)
// Passing null for year uses the current year

echo date('d/m/Y g:ia', mktime(0, 0, 0, 5, 28, null)) . '<br />'; // May 28 this year


// ============================================================
// strtotime() — PARSE A DATE STRING INTO A TIMESTAMP
// ============================================================
// Converts human-readable date strings into Unix timestamps
// Supports relative expressions like 'tomorrow', 'next week', etc.

echo date('d/m/Y g:ia', strtotime('tomorrow'))               . '<br />';
echo date('d/m/Y g:ia', strtotime('first day of next month')) . '<br />';


// ============================================================
// date_parse() — PARSE A DATE STRING INTO AN ARRAY
// ============================================================
// Returns an associative array with date/time components
// Note: works best with standard formats (d/m/Y may cause issues)
// strtotime() is more reliable for parsing arbitrary strings

$date = date('d/m/Y g:ia', strtotime('first day of february'));

echo '<pre>';
print_r(date_parse($date)); // array with year, month, day, hour, minute, etc.
echo '</pre>';
