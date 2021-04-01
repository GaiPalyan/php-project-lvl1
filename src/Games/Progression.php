<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\run;
use function Brain\Games\Helpers\getRandNum;

const DESCRIPTION = 'What number is missing in the progression?';
const ELEMENT_HIDER = '..';
const START_MIN = 1;
const START_MAX = 50;
const LENGTH_MIN = 10;
const LENGTH_MAX = 15;
const STEP_MIN = 3;
const STEP_MAX = 10;

function buildProgression(int $firstNum, int $length, int $step): array
{
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }
    return $progression;
}

function hideElement(array $progression): array
{
    $randomPosition = array_rand($progression);
    $progression[$randomPosition] = ELEMENT_HIDER;
    $hiddenProgression = implode(' ', $progression);
    return [$hiddenProgression, $randomPosition];
}

function getGameData(): array
{
    $startRange = getRandNum(START_MIN, START_MAX);
    $length = getRandNum(LENGTH_MIN, LENGTH_MAX);
    $step = getRandNum(STEP_MIN, STEP_MAX);
    $progression = buildProgression($startRange, $length, $step);

    [$hiddenProgression, $randomPosition] = hideElement($progression);
    $correctAnswer = (string) $progression[$randomPosition];

    return [$hiddenProgression, $correctAnswer];
}

function play(): void
{
    run(DESCRIPTION, fn() => getGameData());
}
