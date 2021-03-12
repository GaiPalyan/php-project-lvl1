<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runEngine;

const DESCRIPTION = 'What is the result of the expression?';

function getExpression(int $num1, int $num2): array
{
    $operators = ['+', '-', '*',];
    $randOperator = array_rand($operators);
    $operator = $operators[$randOperator];
    $mathExpression = "{$num1} {$operators[$randOperator]} {$num2}";
    $expressionResult = getExpressionResult($num1, $num2, $operator);
    return [
        'question' => $mathExpression,
        'correctAnswer' => $expressionResult,
    ];
}

function getExpressionResult(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $correctAnswer = $num1 + $num2;
        case '-':
            return $correctAnswer = $num1 - $num2;
        case '*':
            return $correctAnswer = $num1 * $num2;
        default:
            throw new \Error("Unknown operator {$operator}");
    }
}

function play(): void
{
    $gameData = function (): array {
        $num1 = mt_rand(1, 10);
        $num2 = mt_rand(1, 12);
        return getExpression($num1, $num2);
    };
    runEngine(
        DESCRIPTION,
        $gameData
    );
}
