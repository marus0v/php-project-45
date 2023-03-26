<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

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

function primeGame(string $userName)
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $value = getValue();
    //    print_r(isPrime($value));
    //    $ans = getAnswer();
        $answer = prompt('Your answer: ');
        if (isPrime($value) && $answer === 'yes') {
            $winsNumber++;
            line('Correct!');
        } elseif (!isPrime($value) && $answer === 'no') {
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
    $questionsAndAnswers[0] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    while ($counter < 4) {
        // $values = getValues();
        $questionsAndAnswers[$counter] = getQandA();
        $counter++;
    }
    return $questionsAndAnswers;
}
