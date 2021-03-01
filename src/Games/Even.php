<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

function even(): void
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';

    Engine\flow(
        $question,
        function (): array {
            $exercise = mt_rand(1, 30);
            $correct  = (Engine\isEven($exercise) == true) ? 'yes' : 'no';
            return [
                'correct'  => $correct,
                'exercise' => $exercise,
            ];
        }
    );
}
