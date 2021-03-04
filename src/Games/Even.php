<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\flow;

const QUESTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $int): bool
{
    return ($int % 2) == 0;
}

function play(): void
{
    $gameData = function (): array {
        $exercise = mt_rand(1, 30);
        $correct  = (isEven($exercise) == true) ? 'yes' : 'no';
        return [
            'correct'  => $correct,
            'exercise' => $exercise,
        ];
    };
    flow(
        QUESTION,
        $gameData
    );
}
