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
    $qna['question'] = "{$numA} {$numB}";
    $gcd = 1;
    if ($numA == $numB) {
        $gcd = $numA;
        $qna['answer'] = $gcd;
        return $qna;
    } else {
        while (($numA != 0) && ($numB != 0)) {
            if ($numA > $numB) {
                $numA = $numA % $numB;
            } else if ($numB > $numA) {
                $numB = $numB % $numA;
            }
        }
        $gcd = $numA + $numB;
        $qna['answer'] = $gcd;
        // $values[] = $gcd;
    }
    return $qna;
}

function runGcdGame(): array
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
