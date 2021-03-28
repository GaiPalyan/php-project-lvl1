<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\randNum;
use function Brain\Games\Engine\run;

const DESCRIPTION = 'What number is missing in the progression?';
const INDEX_HIDER = '..';
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

function hideIndex(array $progression, int $randomPosition): string
{
    $progression[$randomPosition] = INDEX_HIDER;
    return $hiddenProgression = implode(' ', $progression);
}

function getGameData(): array
{
    $startRange = randNum(START_MIN, START_MAX);
    $length = randNum(LENGTH_MIN, LENGTH_MAX);
    $step = randNum(STEP_MIN, STEP_MAX);
    $progression = buildProgression($startRange, $length, $step);
    $randomPosition = array_rand($progression);
    var_dump($randomPosition);
    $hiddenProgression = hideIndex($progression, $randomPosition);

    $correctAnswer = "{$progression[$randomPosition]}";

    return [$hiddenProgression, $correctAnswer];
}

function play(): void
{
    $gameData = fn() => getGameData();
    run(DESCRIPTION, $gameData);
}
