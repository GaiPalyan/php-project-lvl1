<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\flow;

const QUESTION = 'What is the result of the expression?';


function play(): void
{
    $gameData = function (): array {
        $operator     = ['+', '-', '*',];
        $randOperator = array_rand($operator);
        $num          = mt_rand(1, 5);
        $num2         = mt_rand(1, 5);
        switch ($operator[$randOperator]) {
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
                throw new \Error("Unknown math exptression {$operator[$randOperator]}");
        }
        return [
            'exercise' => "{$num} {$operator[$randOperator]} {$num2}",
            'correct'  => $correctAnswer,
        ];
    };
    flow(
        QUESTION,
        $gameData
    );
}
