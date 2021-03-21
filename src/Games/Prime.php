<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function getGamePrimeData(): array
{
    $number = mt_rand(1, 35);
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    return [$number, $correctAnswer];
}

function play(): void
{
    $gameData = fn() => getGamePrimeData();
    run(DESCRIPTION, $gameData);
}
