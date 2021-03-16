<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';

function getExpression(): array
{
    $num1 = mt_rand(1, 10);
    $num2 = mt_rand(1, 10);
    $operators = ['+', '-', '*',];
    $randOperator = array_rand($operators);
    $operator = $operators[$randOperator];
    $mathExpression = "{$num1} {$operator} {$num2}";
    $expressionResult = getExpressionResult($num1, $num2, $operator);
    return [$mathExpression, $expressionResult];
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
    $gameData = fn() => getExpression();
    run(
        DESCRIPTION,
        $gameData
    );
}
