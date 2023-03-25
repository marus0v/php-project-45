<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function getValues(): array
{
    $operations = ["+", "-", "*"];
    $operation = $operations[mt_rand(0, 2)];
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
            // line("Question: %s", $question);
            $result = $values[1] + $values[2];
            $qna[] = $result;
            break;
        case "-":
            $question = "{$values[1]} - {$values[2]}";
            $qna[] = $question;
            // line("Question: %s", $question);
            $result = $values[1] - $values[2];
            $qna[] = $result;
            break;
        case "*":
            $question = "{$values[1]} * {$values[2]}";
            $qna[] = $question;
            // line("Question: %s", $question);
            $result = $values[1] * $values[2];
            $qna[] = $result;
            break;
        default:
            throw new \Exception('No operator selected!');
    }
    // $values[] = $result;
    return $qna;
}
function getAnswer(): string
{
    $answer = prompt('Your answer: ');
    return $answer;
}
function calculateGame(string $userName)
{
    $winsNumber = 0;
    line("What is the result of the expression?");
    while ($winsNumber < 3) {
        $values = getValues();
        $result = (countValues($values)[3]);
        $ans = getAnswer();
        if ($ans === $result) {
            $winsNumber++;
            line('Correct!');
        } else {
            echo ("'{$ans}' is wrong answer ;(. Correct answer was '{$result}' \n");
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
}

function runCalcGame(): array
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = "What is the result of the expression?";
    while ($counter < 4) {
        $values = getValues();
        $questionsAndAnswers[$counter] = countValues($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
