<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\randNum;
use function Brain\Games\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const RANGE_MIN = 1;
const RANGE_MAX = 15;

function getGameData(): array
{
    $operand1 = randNum(RANGE_MIN, RANGE_MAX);
    $operand2 = randNum(RANGE_MIN, RANGE_MAX);
    $operator = OPERATORS[array_rand(OPERATORS)];
    $mathExpression = "{$operand1} {$operator} {$operand2}";
    $expressionResult = getExpressionResult($operand1, $operand2, $operator);
    return [$mathExpression, (string) $expressionResult];
}

function getExpressionResult(int $operand1, int $operand2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $correctAnswer = $operand1 + $operand2;
        case '-':
            return $correctAnswer = $operand1 - $operand2;
        case '*':
            return $correctAnswer = $operand1 * $operand2;
        default:
            throw new \Error("Unknown operator {$operator}");
    }
}

function play(): void
{

    run(DESCRIPTION, fn() => getGameData());
}
