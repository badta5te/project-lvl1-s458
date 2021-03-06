<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function game()
{
    $getData = function () {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = getGcd($firstNumber, $secondNumber);
        return [$question, $gcd];
    };
    startGame($getData, DESCRIPTION);
}

function getGcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
