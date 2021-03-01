<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

function expression(): void
{
    $question = 'What is the result of the expression?';
    Engine\flow(
        $question,
        function (): array {
            $math           = ['+', '-', '*',];
            $randExpression = array_rand($math);
            $num            = mt_rand(1, 5);
            $num2           = mt_rand(1, 5);
            switch ($math[$randExpression]) {
                case '+':
                    $correctAnswer = ($num + $num2);
                    break;
                case '-':
                    $correctAnswer = ($num - $num2);
                    break;
                case '*':
                    $correctAnswer = ($num * $num2);
                    break;
                default:
                    $correctAnswer = 0;
            }
            return ['exercise' => "{$num} {$math[$randExpression]} {$num2}", 'correct'  => $correctAnswer,];
        }
    );
}
