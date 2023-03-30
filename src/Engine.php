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

function runGame(array $questionsAndAnswers)
{
    $userName = welcomeUser();
    $winsNumber = 0;
    line("'{$questionsAndAnswers[0]}'");
    while ($winsNumber < 3) {
        line("Question: %s", $questionsAndAnswers[$winsNumber + 1][0]);
        (string)$result = $questionsAndAnswers[$winsNumber + 1][1];
        $ans = getAnswer();
        if ($ans == $result) {
            $winsNumber++;
            line('Correct!');
        } else {
            line("'{$ans}' is wrong answer ;(. Correct answer was '{$result}'");
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!", $userName);
}
