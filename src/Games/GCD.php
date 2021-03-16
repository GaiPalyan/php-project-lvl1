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

function play(): void
{
    $gameData = function (): array {
        $num1 = mt_rand(1, 10);
        $num2 = mt_rand(1, 10);
        $pair = "{$num1} {$num2}";
        $correctAnswer = getGCD($num1, $num2);
        return [$pair, $correctAnswer];
    };
    run(
        DESCRIPTION,
        $gameData
    );
}
