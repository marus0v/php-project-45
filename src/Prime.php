<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function getValue() : int
{
    $num = mt_rand(1, 1000);
    line("Question: %s", $num);
    return $num;
}
function isPrime($number) : bool
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

function primeGame($userName)
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