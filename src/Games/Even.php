<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function getEven(int $int): bool
{
    return ($int % 2) == 0;
}

function play(): void
{
    $gameData = function (): array {
        $number = mt_rand(1, 30);
        $correctAnswer  = getEven($number) == true ? 'yes' : 'no';
        return ['question' => $number, 'correctAnswer'  => $correctAnswer];
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
