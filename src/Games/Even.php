<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\run;
use function Brain\Games\Helpers\randNum;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const RANGE_MIN = 1;
const RANGE_MAX = 50;

function isEven(int $int): bool
{
    return $int % 2 === 0;
}

function getGameData(): array
{
    $number = randNum(RANGE_MIN, RANGE_MAX);
    $correctAnswer = isEven($number) ? 'yes' : 'no';
    return [$number, $correctAnswer];
}

function play(): void
{
    run(DESCRIPTION, fn () => getGameData());
}
