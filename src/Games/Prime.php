<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\flow;

const QUESTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';


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
        $correct  = isPrime($exercise) ? 'yes' : 'no';
        return [
            'exercise' => $exercise,
            'correct'  => $correct,
        ];
    };
    flow(
        QUESTION,
        $gameData
    );
}
