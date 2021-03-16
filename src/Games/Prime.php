<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    $border = $num / 2;
    for ($i = 2; $i < floor($border); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function play(): void
{
    $gameData = function (): array {
        $number = mt_rand(1, 50);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        return [$number, $correctAnswer];
    };
    run(
        DESCRIPTION,
        $gameData
    );
}
