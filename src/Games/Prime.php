<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\TOTALWINSNUMBER;
const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no"';

function getValue(): int
{
    $num = mt_rand(1, 1000);
    line("Question: %s", $num);
    return $num;
}

function isPrime(int $number): bool
{
    $flag = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $flag = false;
            break;
        }
    }
    return $flag;
}

function getQandA(): array
{
    $qna = array();
    $number = mt_rand(0, 1000);
    $qna[] = $number;
    if (isPrime($number)) {
        $qna[] = "yes";
    } elseif (!isPrime($number)) {
        $qna[] = "no";
    }
    return $qna;
}
function runPrimeGame(): array
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
