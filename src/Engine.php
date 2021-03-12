<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function Engine(string $description, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, ' . $userName);
    line($description);
    $correctAnswerCount = 0;
    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $responseFromGames = call_user_func($gameData);
        ['question' => $gameQuestion, 'correctAnswer' => $correctAnswer] = $responseFromGames;
        $gameQuestion      = strval($gameQuestion);
        $correctAnswer     = strval($correctAnswer);
        line('Question: ' . $gameQuestion);
        $userAnswer = prompt('Your answer');
        if (strtolower($userAnswer) === $correctAnswer) {
            $correctAnswerCount++;
            line('Correct!');
        } else {
            line("'{$userAnswer}'" . ' is wrong answer ;(. Correct answer was ' . "'{$correctAnswer}'");
            line('Let\'s try again, ' . $userName . '!');
            break;
        }
    }
    if ($correctAnswerCount === COUNT_ROUNDS) {
        line('Congratulations, ' . $userName . '!');
    }
}
