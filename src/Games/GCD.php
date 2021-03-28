<?php

namespace Brain\Games\gcd;

use function Brain\Games\Helpers\randNum;
use function Brain\Games\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const RANGE_MIN = 1;
const RANGE_MAX = 50;


function getGCD(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $mod = $num1 % $num2;
        $num1 = $num2;
        $num2 = $mod;
    }
    return $num1;
}

function getPair(int $num1, int $num2): string
{
    return "{$num1} {$num2}";
}

function getGameData(): array
{
    $num1 = randNum(RANGE_MIN, RANGE_MAX);
    $num2 = randNum(RANGE_MIN, RANGE_MAX);
    $correctAnswer = getGCD($num1, $num2);
    return [getPair($num1, $num2), (string) $correctAnswer];
}

function play(): void
{
    run(DESCRIPTION, fn() => getGameData());
}
