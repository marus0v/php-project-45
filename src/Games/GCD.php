<?php

namespace BrainGames\GCD;

use function cli\line;
use function BrainGames\Engine\getAnswer;

function getValues(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 100);
    $values = array();
    $values[] = $num1;
    $values[] = $num2;
    return $values;
}
function countValues(array $values): array
{
    $qna = array();
    $numA = $values[0];
    $numB = $values[1];
    // echo ("Question: {$numA} {$numB} \n");
    $qna[] = "{$numA} {$numB}";
    $gcd = 1;
    if ($numA == $numB) {
        $gcd = $numA;
        $values[] = $gcd;
        return $values;
    } else {
        while (($numA != 0) && ($numB != 0)) {
            if ($numA > $numB) {
                $numA = $numA % $numB;
            } else if ($numB > $numA) {
                $numB = $numB % $numA;
            }
        }
        $gcd = $numA + $numB;
        $qna[] = $gcd;
        $values[] = $gcd;
    }
    return $qna;
}
function gcdGame(string $userName)
{
    echo ("Find the greatest common divisor of given numbers. \n");
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $values = getValues();
        $result = (countValues($values)[2]);
        $ans = getAnswer();
        if ($ans == $result) {
            $winsNumber++;
            line('Correct!');
        } else {
            echo ("'{$ans}' is wrong answer ;(. Correct answer was '{$result}' \n");
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
}

function runGcdGame(): array
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = "Find the greatest common divisor of given numbers.";
    while ($counter < 4) {
        $values = getValues();
        $questionsAndAnswers[$counter] = countValues($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
