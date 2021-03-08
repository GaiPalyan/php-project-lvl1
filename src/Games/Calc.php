<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\Engine;

const DESCRIPTION = 'What is the result of the expression?';

function getExpression(int $num1, int $num2): array
{
        $operators     = ['+', '-', '*',];
        $randOperator = array_rand($operators);
    switch ($operators[$randOperator]) {
        case '+':
            $question      = "{$num1} + {$num2}";
            $correctAnswer = $num1 + $num2;
            break;
        case '-':
            $question      = "{$num1} - {$num2}";
            $correctAnswer = $num1 - $num2;
            break;
        case '*':
            $question      = "{$num1} * {$num2}";
            $correctAnswer = $num1 * $num2;
            break;
        default:
            throw new \Error("Unknown math expression {$operators[$randOperator]}");
    }
            return [
                'question'       => $question,
                'correctAnswer'  => $correctAnswer,
                ];
}

function play(): void
{
    $gameData = function (): array {
        $num1         = mt_rand(1, 8);
        $num2         = mt_rand(1, 8);
        return getExpression($num1, $num2);
    };
    Engine(
        DESCRIPTION,
        $gameData
    );
}
