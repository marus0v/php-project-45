<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $number): bool
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function evenGame(string $userName)
{
    // $qna = array();
    // line('Answer "yes" if the number is even, otherwise answer "no".');
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $number = mt_rand(0, 100);
        line("Question: %s!", $number);
        // $qna[] = $question;
        $answer = prompt('Your answer: ');
        if (isEven($number) && $answer === 'yes') {
            $winsNumber++;
            line('Correct!');
        } elseif (!isEven($number) && $answer === 'no') {
            $winsNumber++;
            line('Correct!');
        } else {
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
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
    $questionsAndAnswers[0] = 'Answer "yes" if the number is even, otherwise answer "no".';
    while ($counter < 4) {
        // $values = getValues();
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    return $questionsAndAnswers;
}
