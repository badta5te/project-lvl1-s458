<?php

namespace BrainGames\Gcd;

use function BrainGames\GameEngine\startGame;

const DESCRIPTION = "Find the greatest common divisor of given numbers.\n";

function game()
{
    $data = function () {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = gcd($firstNumber, $secondNumber);
        return [$question, $gcd];
    };
    startGame($data, DESCRIPTION);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
