<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\run;
use function Brain\Games\Helpers\getRandNum;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const RANGE_MIN = 1;
const RANGE_MAX = 50;

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

function getGameData(): array
{
    $number = getRandNum(RANGE_MIN, RANGE_MAX);
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    return [$number, $correctAnswer];
}

function play(): void
{
    run(DESCRIPTION, fn() => getGameData());
}
