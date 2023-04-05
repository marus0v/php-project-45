<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

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
    $questionsAndAnswersLocal = [];
    $number = mt_rand(0, 100);
    $questionsAndAnswersLocal['question'] = $number;
    if (isEven($number)) {
        $questionsAndAnswersLocal['answer'] = "yes";
    } else {
        $questionsAndAnswersLocal['answer'] = "no";
    }
    return $questionsAndAnswersLocal;
}

function runEvenGame()
{
    $counter = 0;
    $questionsAndAnswers = [];
    while ($counter < (TOTALWINSNUMBER)) {
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    runGame(DESCRIPTION, $questionsAndAnswers);
}
