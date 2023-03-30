<?php

namespace BrainGames\Progression;

use function cli\line;
use function BrainGames\Engine\getAnswer;

const TOTALWINSNUMBER = 3;
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
    $qna[] = implode(" ", $hid_values);
    $qna[] = $values[$i];
    return $qna;
}
function runProGame()
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = DESCRIPTION;
    while ($counter < (TOTALWINSNUMBER + 1)) {
        $values = getValues();
        $questionsAndAnswers[$counter] = getQandA($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
