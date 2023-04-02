<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\TOTALWINSNUMBER;

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
    $qna['question'] = $number;
    if (isEven($number)) {
        $qna['answer'] = "yes";
    } elseif (!isEven($number)) {
        $qna['answer'] = "no";
    }
    return $qna;
}

function runEvenGame(): array
{
    $counter = 0;
    $questionsAndAnswers = array();
    while ($counter < (TOTALWINSNUMBER)) {
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    return $questionsAndAnswers;
}
