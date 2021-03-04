<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;



function answer(string $question): string
{
    $answer = prompt($question);
    return $answer;
}

function greetUser(): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, ' . $userName);
    return $userName;
}

function flow(string $question, callable $gameData): void
{
    $userName = greetUser();
    line($question);
    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $responseFromGames = call_user_func($gameData);
        $gameExercise      = strval($responseFromGames['exercise']);
        $correctAnswer     = strval($responseFromGames['correct']);

        line('Question: ' . $gameExercise);
        $userAnswer = answer('Your answer');
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
