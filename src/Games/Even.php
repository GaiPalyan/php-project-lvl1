<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $int): bool
{
    return ($int % 2) === 0;
}

function getEven(): array
{
    $number = mt_rand(1, 30);
    $correctAnswer = isEven($number) === true ? 'yes' : 'no';
    return [$number, $correctAnswer];
}

function play(): void
{
    $gameData = fn () => getEven();
    run(
        DESCRIPTION,
        $gameData
    );
}
