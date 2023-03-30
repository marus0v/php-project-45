<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

const TOTALWINSNUMBER = 3;
const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function getQandA(): array
{
    $qna = array();
    $number = mt_rand(0, 100);
    $qna[] = $number;
    if (isEven($number)) {
        $qna[] = "yes";
    } elseif (!isEven($number)) {
        $qna[] = "no";
    }
    return $qna;
}

function runEvenGame(): array
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = DESCRIPTION;
    while ($counter < (TOTALWINSNUMBER + 1)) {
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    return $questionsAndAnswers;
}
