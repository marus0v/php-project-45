<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcomeUser()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getAnswer(): string
{
    $answer = prompt('Your answer: ');
    return $answer;
}

function runGame(string $userName, array $questionsAndAnswers)
{
    $winsNumber = 0;
    // line("What is the result of the expression?");
    echo ("'{$questionsAndAnswers[0]}' \n");
    while ($winsNumber < 3) {
        // $values = getValues();
        line("Question: %s", $questionsAndAnswers[$winsNumber + 1][0]);
        (string)$result = $questionsAndAnswers[$winsNumber + 1][1];
        $ans = getAnswer();
        if ($ans == $result) {
            $winsNumber++;
            line('Correct!');
        } else {
            echo ("'{$ans}' is wrong answer ;(. Correct answer was '{$result}' \n");
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
}
