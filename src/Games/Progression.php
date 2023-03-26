<?php

namespace BrainGames\Progression;

use function cli\line;
use function BrainGames\Engine\getAnswer;

function getValues(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 10);
    $values = array();
    $values[] = $num1;
    for ($i = 0; $i < 9; $i++) {
        $values[] = $values[$i] + $num2;
    }
    $str_values = implode(" ", $values);
    return $values;
}
function hideValue(array $values): array
{
    $qna = array();
    $i = mt_rand(0, 9);
    $hid_values = $values;
    $hid_values[$i] = "..";
    // $values[10] = $values[$i];
    // $str_values = implode(" ", $hid_values);
    $qna[] = implode(" ", $hid_values);
    $qna[] = $values[$i];
    // line("Question: %s!", $str_values);
    return $qna;
}

function proGame(string $userName)
{
    echo ("What number is missing in the progression? \n");
    $winsNumber = 0;
    while ($winsNumber < 3) {
        $values = getValues();
        $result = (hideValue($values)[10]);
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

function getQandA(array $values): array
{
    $qna = array();
    $i = mt_rand(0, 9);
    $hid_values = $values;
    $hid_values[$i] = "..";
    $qna[] = implode(" ", $hid_values);
    $qna[] = $values[$i];
    return $qna;
}
function runProGame()
{
    $counter = 1;
    $questionsAndAnswers = array();
    $questionsAndAnswers[0] = "What number is missing in the progression?";
    while ($counter < 4) {
        $values = getValues();
        $questionsAndAnswers[$counter] = getQandA($values);
        $counter++;
    }
    return $questionsAndAnswers;
}
