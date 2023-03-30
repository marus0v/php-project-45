<?php

namespace BrainGames\GCD;

use function cli\line;

use const BrainGames\Engine\TOTALWINSNUMBER;
const DESCRIPTION = "Find the greatest common divisor of given numbers.";

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

function runGcdGame(): array
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = DESCRIPTION;
    while ($counter < (TOTALWINSNUMBER + 1)) {
        $values = getValues();
        $questionsAndAnswers[$counter] = countValues($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
