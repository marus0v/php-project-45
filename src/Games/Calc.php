<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function getValues(): array
{
    $operations = array("+", "-", "*");
    $operation = $operations[mt_rand(0, 2)];
    $num1 = mt_rand(0, 100);
    $num2 = mt_rand(0, 100);
    $values[] = $operation;
    $values[] = $num1;
    $values[] = $num2;
    return $values;
}
function countValues($values): array
{
    switch ($values[0]) {
        case "+":
            $question = "{$values[1]} + {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] + $values[2];
            break;
        case "-":
            $question = "{$values[1]} - {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] - $values[2];
            break;
        case "*":
            $question = "{$values[1]} * {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] * $values[2];
            break;
    }
    $values[] = $result;
    return $values;
}
function getAnswer(): int
{
    $answer = prompt('Your answer: ');
    return $answer;
}
function calcGame($userName)
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
