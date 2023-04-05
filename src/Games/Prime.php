<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

use const BrainGames\Engine\TOTALWINSNUMBER;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $questionsAndAnswersLocal = [];
    $number = mt_rand(0, 1000);
    $questionsAndAnswersLocal['question'] = $number;
    if (isPrime($number)) {
        $questionsAndAnswersLocal['answer'] = "yes";
    } elseif (!isPrime($number)) {
        $questionsAndAnswersLocal['answer'] = "no";
    }
    return $questionsAndAnswersLocal;
}
function runPrimeGame(): array
{
    $counter = 0;
    $questionsAndAnswers = [];
    while ($counter < TOTALWINSNUMBER) {
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    return $questionsAndAnswers;
}
