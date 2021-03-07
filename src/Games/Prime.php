<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';


function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}


function play(): void
{
    $gameData = function (): array {
        $exercise = mt_rand(1, 50);
        $correctAnswer  = isPrime($exercise) ? 'yes' : 'no';
        return [
            'question' => $exercise,
            'correctAnswer'  => $correctAnswer,
        ];
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
