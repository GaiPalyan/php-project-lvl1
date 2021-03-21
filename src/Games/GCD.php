<?php

namespace Brain\Games\gcd;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGCD(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $mod = $num1 % $num2;
        $num1 = $num2;
        $num2 = $mod;
    }
    return $num1;
}

function getPair($num1, $num2): string
{
    return "{$num1} {$num2}";
}

function getGameGcdData(): array
{
    $num1 = mt_rand(1, 10);
    $num2 = mt_rand(1, 10);
    $correctAnswer = getGCD($num1, $num2);
    return [getPair($num1, $num2), (string) $correctAnswer];
}

function play(): void
{
    $gameData = fn() => getGameGcdData();
    run(DESCRIPTION, $gameData);
}
