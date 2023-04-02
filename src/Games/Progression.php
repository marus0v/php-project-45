<?php

namespace BrainGames\Progression;

use function cli\line;

use const BrainGames\Engine\TOTALWINSNUMBER;

const DESCRIPTION = "What number is missing in the progression?";

function getValues(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 10);
    $values = array();
    $values[] = $num1;
    for ($i = 0; $i < 9; $i++) {
        $values[] = $values[$i] + $num2;
    }
    $str_values = implode(" ", $values);
    return $values;
}

function getQandA(array $values): array
{
    $qna = array();
    $i = mt_rand(0, 9);
    $hid_values = $values;
    $hid_values[$i] = "..";
    $qna['question'] = implode(" ", $hid_values);
    $qna['answer'] = $values[$i];
    return $qna;
}
function runProGame()
{
    $counter = 0;
    $questionsAndAnswers = array();
    while ($counter < TOTALWINSNUMBER) {
        $values = getValues();
        $questionsAndAnswers[$counter] = getQandA($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
