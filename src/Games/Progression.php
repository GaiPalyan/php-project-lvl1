<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = 'What number is missing in the progression?';

function getProgression(): array
{
    $firstNum = mt_rand(1, 15);
    $length = mt_rand(10, 15);
    $step = mt_rand(2, 5);
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }

    $randPosition = array_rand($progression, 1);
    $hiddenNumber = $progression[$randPosition];
    $progression[$randPosition] = '..';
    $hiddenPosition = implode(' ', $progression);
    return [
        'question' => $hiddenPosition,
        'correctAnswer' => $hiddenNumber,
    ];
}

function play(): void
{
    $gameData = fn() => getProgression();
    runEngine(
        DESCRIPTION,
        $gameData
    );
}
