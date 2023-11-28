<?php

use Carbon\Carbon;

if (!function_exists('createCalendar')) {

  function createCalendar()
  {
    $dt = Carbon::now();

    $today = $dt->day;
    $currentMonth = $dt->month;

    $calendar = [];
    $length = 0;

    // get the week number of the first day of the month
    $dt->day = 1;
    $start = 0 - $dt->dayOfWeekIso;
    $dt->day += $start;

    // fill the array with empty days
    for ($i = $start; $i < $dt->daysInMonth; $i += 7) {
      $week = [];

      for ($j = 0; $j < 7; $j++) {
        array_push($week, [
          'date' => $dt->day,
          'day' => $dt->dayOfWeek,
          'isDayOfMonth' => $currentMonth == $dt->month
        ]);
        $dt->day += 1;
        $length += 1;
      }

      array_push($calendar, [
        'week_number' => $dt->weekOfYear,
        'days' => $week,
      ]);
    }

    return $calendar;
  }
}
