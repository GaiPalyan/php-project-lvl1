<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

const EXCEPTION_NUMBER = 2;


function isPrime($num): bool
{
    if ($num == 1) {
        return false;
    } else if ($num == EXCEPTION_NUMBER) {
        return true;
    } else if (Engine\isEven($num)) {
        return false;
    }

    $ceil = ceil(sqrt($num));
    for ($i = 3; $i <= $ceil; $i += 2) {
        if (($num % $i) == 0) {
            return false;
        }
    }
    return true;
}


function primeGame()
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    Engine\flow(
        $question,
        function () {
            $exercise = mt_rand(1, 50);
            $correct  = isPrime($exercise) ? 'yes' : 'no';
            return [
                'exercise' => $exercise,
                'correct'  => $correct,
            ];
        }
    );
}
