<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

const TOTALWINSNUMBER = 3;

function getValues(): array
{
    $operations = ["+", "-", "*"];
    $operation = $operations[array_rand($operations, 1)];
    $num1 = mt_rand(0, 100);
    $num2 = mt_rand(0, 100);
    $values = array();
    $values[] = $operation;
    $values[] = $num1;
    $values[] = $num2;
    return $values;
}
function countValues(array $values): array
{
    $result = 0;
    $qna = array();
    switch ($values[0]) {
        case "+":
            $question = "{$values[1]} + {$values[2]}";
            $qna[] = $question;
            $result = $values[1] + $values[2];
            $qna[] = $result;
            break;
        case "-":
            $question = "{$values[1]} - {$values[2]}";
            $qna[] = $question;
            $result = $values[1] - $values[2];
            $qna[] = $result;
            break;
        case "*":
            $question = "{$values[1]} * {$values[2]}";
            $qna[] = $question;
            $result = $values[1] * $values[2];
            $qna[] = $result;
            break;
        default:
            throw new \Exception('No operator selected!');
    }
    return $qna;
}

function runCalcGame(): array
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = "What is the result of the expression?";
    while ($counter < (TOTALWINSNUMBER + 1)) {
        $values = getValues();
        $questionsAndAnswers[$counter] = countValues($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
