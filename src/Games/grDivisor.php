<?php

namespace Brain\Games\grDivisor;

use Brain\Games\Engine;

function getGrDivisor(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $mod = $num1 % $num2;
        $num1 = $num2;
        $num2 = $mod;
    }
    $grDivisor = $num1;

    return $grDivisor;
}

function grDivisiorGame(): void
{
    $question = 'Find the greatest common divisor of given numbers.';
    Engine\flow(
        $question,
        function (): array {
            $num1 = mt_rand(1, 10);
            $num2 = mt_rand(1, 10);
            $grDivisor = getGrDivisor($num1, $num2);
            return ['exercise' => $num1 . ' ' . $num2, 'correct' => $grDivisor];
        }
    );
}
