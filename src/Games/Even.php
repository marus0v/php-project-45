<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven($number) : bool
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function evenGame($userName)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $number = mt_rand(0, 100);
        line("Question: %s!", $number);
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