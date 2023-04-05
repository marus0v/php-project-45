<?php

namespace BrainGames\Progression;

use function cli\line;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\TOTALWINSNUMBER;

const DESCRIPTION = "What number is missing in the progression?";

function getValues(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 10);
    $values = [];
    $values[] = $num1;
    for ($i = 0; $i < 9; $i++) {
        $values[] = $values[$i] + $num2;
    }
    return $values;
}

function getQandA(array $values): array
{
    $questionsAndAnswersLocal = [];
    $i = mt_rand(0, 9);
    $hidValues = $values;
    $hidValues[$i] = "..";
    $questionsAndAnswersLocal['question'] = implode(" ", $hidValues);
    $questionsAndAnswersLocal['answer'] = $values[$i];
    return $questionsAndAnswersLocal;
}
function runProGame()
{
    $counter = 0;
    $questionsAndAnswers = [];
    while ($counter < TOTALWINSNUMBER) {
        $values = getValues();
        $questionsAndAnswers[$counter] = getQandA($values);
        $counter++;
    }
    runGame(DESCRIPTION, $questionsAndAnswers);
}
