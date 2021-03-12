<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $firstNum, int $length, int $step): array
{
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }

    $keyOfNumber               = array_rand($progression, 1);
    $correctAnswer             = $progression[$keyOfNumber];
    $progression[$keyOfNumber] = '..';
    $missingNumber             = implode(' ', $progression);
    return [
        'question'       => $missingNumber,
        'correctAnswer'  => $correctAnswer,
    ];
}

function play(): void
{
    $gameData = function (): array {
        $firstNum = mt_rand(1, 15);
        $length   = mt_rand(10, 15);
        $step     = mt_rand(2, 5);
        return getProgression($firstNum, $length, $step);
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
