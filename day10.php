<?php

$input = "noop
noop
addx 15
addx -10
noop
noop
addx 3
noop
noop
addx 7
addx 1
addx 4
addx -1
addx 1
addx 5
addx 1
noop
noop
addx 5
addx -1
noop
addx 3
noop
addx 3
addx -38
noop
addx 3
addx 2
addx 5
addx 2
addx 26
addx -21
addx -2
addx 5
addx 2
addx -14
addx 15
noop
addx 7
noop
addx 2
addx -22
addx 23
addx 2
addx 5
addx -40
noop
noop
addx 3
addx 2
noop
addx 24
addx -19
noop
noop
noop
addx 5
addx 5
addx 2
noop
noop
noop
noop
addx 7
noop
addx 3
noop
addx 3
addx -2
addx 2
addx 5
addx -38
noop
noop
noop
addx 5
addx 2
addx -1
addx 2
addx 30
addx -23
noop
noop
noop
noop
addx 3
addx 5
addx -11
addx 12
noop
addx 6
addx 1
noop
addx 4
addx 3
noop
addx -40
addx 4
addx 28
addx -27
addx 5
addx 2
addx 5
noop
noop
addx -2
addx 2
addx 5
addx 3
noop
addx 2
addx -25
addx 30
noop
addx 3
addx -2
addx 2
addx 5
addx -39
addx 29
addx -27
addx 5
noop
noop
noop
addx 4
noop
addx 1
addx 2
addx 5
addx 2
noop
noop
noop
noop
addx 5
addx 1
noop
addx 2
addx 5
addx -32
addx 34
noop
noop
noop
noop";
/*
$input = "addx 15
addx -11
addx 6
addx -3
addx 5
addx -1
addx -8
addx 13
addx 4
noop
addx -1
addx 5
addx -1
addx 5
addx -1
addx 5
addx -1
addx 5
addx -1
addx -35
addx 1
addx 24
addx -19
addx 1
addx 16
addx -11
noop
noop
addx 21
addx -15
noop
noop
addx -3
addx 9
addx 1
addx -3
addx 8
addx 1
addx 5
noop
noop
noop
noop
noop
addx -36
noop
addx 1
addx 7
noop
noop
noop
addx 2
addx 6
noop
noop
noop
noop
noop
addx 1
noop
noop
addx 7
addx 1
noop
addx -13
addx 13
addx 7
noop
addx 1
addx -33
noop
noop
noop
addx 2
noop
noop
noop
addx 8
noop
addx -1
addx 2
addx 1
noop
addx 17
addx -9
addx 1
addx 1
addx -3
addx 11
noop
noop
addx 1
noop
addx 1
noop
noop
addx -13
addx -19
addx 1
addx 3
addx 26
addx -30
addx 12
addx -1
addx 3
addx 1
noop
noop
noop
addx -9
addx 18
addx 1
addx 2
noop
noop
addx 9
noop
noop
noop
addx -1
addx 2
addx -37
addx 1
addx 3
noop
addx 15
addx -21
addx 22
addx -6
addx 1
noop
addx 2
addx 1
noop
addx -10
noop
noop
addx 20
addx 1
addx 2
addx 2
addx -6
addx -11
noop
noop
noop";*/

function day1($input) {
  $lines = explode("\n", $input);
  $cycle = 0;
  $th = [20, 60, 100, 140, 180, 220];
  $x = 1;
  $res = 0;
  for ($i = 0; $i < sizeof($lines); $i++) {
    $split = explode(' ', $lines[$i]);
    if ($split[0] == 'noop') {
      $cycle++;
      if (in_array($cycle, $th)) {
        $res += $x * $cycle;
      }
    } else {
      $cycle++;
      if (in_array($cycle, $th)) {
        $res += $x * $cycle;
      }
      $cycle++;
      if (in_array($cycle, $th)) {
        $res += $x * $cycle;
      }
      $x += (int) $split[1];
    }
  }

  return $res;
}

function day2($input) {
  $lines = explode("\n", $input);
  $cycle = 0;
  $x = 1;
  $res = '';
  for ($i = 0; $i < sizeof($lines); $i++) {
    $split = explode(' ', $lines[$i]);
    if ($split[0] == 'noop') {
      if (abs($cycle - $x) <= 1) {
        $res .= '#';
      } else {
        $res .= '.';
      }
      if (($cycle+1) % 40 == 0) {
        $res .= "\n";
        $cycle = -1;
      }
      $cycle++;
    } else {
      if (abs($cycle - $x) <= 1) {
        $res .= '#';
      } else {
        $res .= '.';
      }
      if (($cycle+1) % 40 == 0) {
        $res .= "\n";
        $cycle = -1;
      }
      $cycle++;
      if (abs($cycle - $x) <= 1) {
        $res .= '#';
      } else {
        $res .= '.';
      }
      if (($cycle+1) % 40 == 0) {
        $res .= "\n";
        $cycle = -1;
      }
      $cycle++;
      $x += (int) $split[1];
    }
  }

  return $res;
}

//echo day1($input);
echo day2($input);
