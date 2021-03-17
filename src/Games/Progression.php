<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'What number is missing in the progression?';

function buildProgression(): array
{
    $firstNum = mt_rand(1, 15);
    $length = mt_rand(10, 15);
    $step = mt_rand(2, 5);
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }
    return $progression;
}

function hideProgression(): array
{
    $progression = buildProgression();
    $randPosition = array_rand($progression);
    $correctAnswer = $progression[$randPosition];
    $progression[$randPosition] = '..';
    $hiddenProgression = implode(' ', $progression);
    return [$hiddenProgression, $correctAnswer];
}

function play(): void
{
    $gameData = fn() => hideProgression();
    run(DESCRIPTION, $gameData);
}
