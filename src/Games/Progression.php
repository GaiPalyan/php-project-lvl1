<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'What number is missing in the progression?';

function play(): void
{
    $gameData = function (): array {
        $firstProgressionNumber = mt_rand(1, 15);
        $progressionLength      = mt_rand(10, 15);
        $progressionStep        = mt_rand(2, 5);

        $progression = [];
        for ($n = 1; $n < $progressionLength; $n++) {
            $progression[] = $firstProgressionNumber + ($n - 1) * $progressionStep;
        }

        $keyOfNumber               = array_rand($progression, 1);
        $correctAnswer                   = $progression[$keyOfNumber];
        $progression[$keyOfNumber] = '..';
        $question                  = implode(' ', $progression);
        return [
            'question' => $question,
            'correctAnswer'  => $correctAnswer,
        ];
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
