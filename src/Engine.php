<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(string $description, callable $gamesData): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, ' . $userName);
    line($description);
    $correctAnswersCount = 0;
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$gameQuestion, $correctAnswer] = call_user_func($gamesData);
        line('Question: ' . $gameQuestion);
        $userAnswer = prompt('Your answer');
        if (strtolower($userAnswer) === $correctAnswer) {
            $correctAnswersCount++;
            line('Correct!');
        } else {
            line("'{$userAnswer}'" . ' is wrong answer ;(. Correct answer was ' . "'{$correctAnswer}'");
            line('Let\'s try again, ' . $userName . '!');
            break;
        }
    }
    if ($correctAnswersCount === ROUNDS_COUNT) {
        line('Congratulations, ' . $userName . '!');
    }
}
