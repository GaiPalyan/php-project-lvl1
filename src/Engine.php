<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function Engine(string $question, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, ' . $userName);
    line($question);
    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $responseFromGames = call_user_func($gameData);
        $gameQuestion      = strval($responseFromGames['question']);
        $correctAnswer     = strval($responseFromGames['correctAnswer']);

        line('Question: ' . $gameQuestion);
        $userAnswer = prompt('Your answer');
        if (strtolower($userAnswer) === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$userAnswer}'" . ' is wrong answer ;(. Correct answer was ' . "'{$correctAnswer}'");
            line('Let\'s try again, ' . $userName . '!');
            break;
        }
    }
    if ($i === COUNT_ROUNDS) {
        line('Congratulations, ' . $userName . '!');
    }
}
