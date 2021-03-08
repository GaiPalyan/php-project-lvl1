<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num == 2) {
        return true;
    } elseif (($num % 2 == 0) || $num == 1) {
        return false;
    }
    $divisor = $num / 2;
    for ($i = 3; $i < floor($divisor); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function play(): void
{
    $gameData = function (): array {
        $number = mt_rand(1, 50);
        $correctAnswer  = isPrime($number) ? 'yes' : 'no';
        return [
            'question'       => $number,
            'correctAnswer'  => $correctAnswer,
        ];
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
