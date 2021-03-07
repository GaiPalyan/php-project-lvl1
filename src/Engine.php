<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function flow(string $question, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');;
    line('Hello, ' . $userName);
    line($question);
    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $responseFromGames = call_user_func($gameData);
        $gameExercise      = strval($responseFromGames['exercise']);
        $correctAnswer     = strval($responseFromGames['correct']);

        line('Question: ' . $gameExercise);
        $userAnswer = prompt('Your answer');
        if (strtolower($userAnswer) === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}'" . ' is wrong answer ;(. Correct answer was ' . "'{$correctAnswer}'");
            line('Let\'s try again, ' . $userName . '!');
            break;
        }
    }
    line('Congratulations, ' . $userName . '!');
}
