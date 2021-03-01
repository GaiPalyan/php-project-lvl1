<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function isEven(int $int): bool
{
    return ($int % 2) == 0;
}

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

function flow(string $question, callable $callback): void
{
    $userName = greetUser();
    line($question);
    for ($i = 0; $i < COUNT_ROUNDS;) {
        $responseFromGames = call_user_func($callback);
        $gameExercise      = strval($responseFromGames['exercise']);
        $correctAnswer     = strval($responseFromGames['correct']);

        $userAnswer = answer('Question: ' . $gameExercise);
        if (strtolower($userAnswer) === $correctAnswer) {
            line('Your answer: ' . $userAnswer);
            line('Correct!');
            $i++;
            if ($i === COUNT_ROUNDS) {
                line('Congratulations, ' . $userName . '!');
            }
        } else {
            line("'{$userAnswer}'" . ' is wrong answer ;(. Correct answer was ' . "'{$correctAnswer}'");
            line('Let\'s try again, ' . $userName . '!');
            break;
        }
    }
}
