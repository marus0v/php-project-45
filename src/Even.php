<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven($number) : bool
{
    if ($number % 2 === 0) {
        return true;
    }
}

function evenGame()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $number = mt_rand(0, 10000);
        line("Question: %s!", $number);
        $answer = prompt('Your answer: ');
        if (isEven($number) && $answer === 'yes') {
            $winsNumber++;
            line('Correct!');
        } elseif (!isEven($number)) && $answer === 'no') {
            $winsNumber++;
            line('Correct!');
        } else {
            line("Let's try again, %s!", $name);
            break;
        }
    }
    line("Congratulations, %s!, $name);
}