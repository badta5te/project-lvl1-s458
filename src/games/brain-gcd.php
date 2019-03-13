<?php

namespace BrainGames\BrainGcd;

use function BrainGames\GameEngine\startGame;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = "Find the greatest common divisor of given numbers.\n";


function game()
{
    $data = function () {
        $firstNumber = rand(1, 50);
        $secondNumber = rand(1, 50);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = gcd($firstNumber, $secondNumber);
        return [
            'question' => $question,
            'correctAnswer' => $gcd
        ];
    };
    startGame($data, DESCRIPTION);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
