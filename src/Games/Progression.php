<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $firstNum, int $length, int $step): array
{
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }

    $randPosition = array_rand($progression, 1);
    $hiddenNumber = $progression[$randPosition];
    $progression[$randPosition] = '..';
    $hiddenProgression = implode(' ', $progression);
    return [
        'question' => $hiddenProgression,
        'correctAnswer' => $hiddenNumber,
    ];
}

function play(): void
{
    $gameData = function (): array {
        $firstNum = mt_rand(1, 15);
        $length = mt_rand(10, 15);
        $step = mt_rand(2, 5);
        return getProgression($firstNum, $length, $step);
    };
    runEngine(
        DESCRIPTION,
        $gameData
    );
}
