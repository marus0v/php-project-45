<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function getValues() : array
{
    $operations = array("+", "-", "*");
    $operation = $operations[mt_rand(0, 2)];
    $num1 = mt_rand(0, 100);
    $num2 = mt_rand(0, 100);
    // $values[] = 0;
    $values[] = $operation;
    $values[] = $num1;
    $values[] = $num2;
    // line("Values are: %s, ", $values[0]);
    // line("Values are: %s, ", $values[1]);
    // line("Values are: %s, ", $values[2]);
    return $values;
}
            // line("Result is: %s, ", $result);
function countValues($values) : array
{
    switch($values[0]) {
        case "+":
            $question = "{$values[1]} + {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] + $values[2];
            // line("Result is: %s, ", $result);
            break;
        case "-":
            $question = "{$values[1]} - {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] - $values[2];
            // line("Result is: %s, ", $result);
            break;
        case "*":
            $question = "{$values[1]} * {$values[2]}";
            line("Question: %s", $question);
            $result = $values[1] * $values[2];
            // line("Result is: %s, ", $result);
            break;
    }
    $values[] = $result;
    return $values;
}
function getAnswer()
{
    $answer = prompt('Your answer: ');
    return $answer;
}
function checkAnswer($answer, $result) : bool
{
    if ($answer === $result) {
        return true;
    } else {
        return false;
    }
}

function calcGame($userName)
{
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $values = getValues();
        // countValues($values);
        $result = (countValues($values)[3]);
        // $ans = getAnswer();
        // line("Result: %s!", $result);
        // line("Answer: %s!", $ans);
        // checkAnswer($answer, $result);
        if (getAnswer() === $result) {
            $winsNumber++;
            line('Correct!');
        } else {
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
}
