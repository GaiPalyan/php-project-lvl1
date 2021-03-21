<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'What number is missing in the progression?';

const HIDE = '..';

function getFirstNum(): int
{
    return mt_rand(3, 10);
}

function getLength(): int
{
    return mt_rand(10, 20);
}

function getStep(): int
{
    return mt_rand(3, 8);
}

function buildProgression(int $firstNum, int $length, int $step): array
{
    $progression = [];
    for ($n = 0; $n < $length; $n++) {
        $progression[] = $firstNum + $n * $step;
    }
    return $progression;
}

function getGameProgressionData(): array
{
    $progression = buildProgression(getFirstNum(), getLength(), getStep());
    $randomPosition = array_rand($progression);

    $correctAnswer = "{$progression[$randomPosition]}";

    $hiddenProgression = function () use ($progression, $randomPosition) {
        $progression[$randomPosition] = HIDE;
        return $hiddenProgression = implode(' ', $progression);
    };

    return [$hiddenProgression(), $correctAnswer];
}

function play(): void
{
    $gameData = fn() => getGameProgressionData();
    run(DESCRIPTION, $gameData);
}
