<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const TOTALWINSNUMBER = 3;

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

function runGame(string $description, array $questionsAndAnswers)
{
    $userName = welcomeUser();
    $winsNumber = 0;
    line($description);
    while ($winsNumber < TOTALWINSNUMBER) {
        line("Question: %s", $questionsAndAnswers[$winsNumber]['question']);
        (string)$result = $questionsAndAnswers[$winsNumber]['answer'];
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
