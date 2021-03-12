<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $int): bool
{
    return ($int % 2) === 0;
}

function play(): void
{
    $gameData = function (): array {
        $number = mt_rand(1, 30);
        $correctAnswer = isEven($number) === true ? 'yes' : 'no';
        return ['question' => $number, 'correctAnswer' => $correctAnswer];
    };
    runEngine(
        DESCRIPTION,
        $gameData
    );
}
