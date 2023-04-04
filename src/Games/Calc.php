<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\TOTALWINSNUMBER;

const DESCRIPTION = "What is the result of the expression?";

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
    $questionsAndAnswersLocal = [];
    switch ($values[0]) {
        case "+":
            $question = "{$values[1]} + {$values[2]}";
            $questionsAndAnswersLocal['question'] = $question;
            $result = $values[1] + $values[2];
            $questionsAndAnswersLocal['answer'] = $result;
            break;
        case "-":
            $question = "{$values[1]} - {$values[2]}";
            $questionsAndAnswersLocal['question'] = $question;
            $result = $values[1] - $values[2];
            $questionsAndAnswersLocal['answer'] = $result;
            break;
        case "*":
            $question = "{$values[1]} * {$values[2]}";
            $questionsAndAnswersLocal['question'] = $question;
            $result = $values[1] * $values[2];
            $questionsAndAnswersLocal['answer'] = $result;
            break;
        default:
            throw new \Exception('No operator selected!');
    }
    return $questionsAndAnswersLocal;
}

function runCalcGame(): array
{
    $counter = 0;
    $questionsAndAnswers = array();
    while ($counter < TOTALWINSNUMBER) {
        $values = getValues();
        $questionsAndAnswers[$counter] = countValues($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
