<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "What number is missing in the progression?";
const SIZE_OF_PROGRESSION = 10;

function game()
{
    $getData = function () {
        $begin = rand(1, 5);
        $step = rand(1, 5);
        $positionOfHiddenElement = rand(0, SIZE_OF_PROGRESSION - 1);
        $progression = [];
        for ($i = 1; $i <= SIZE_OF_PROGRESSION; $i++) {
            $progression[] = $begin + $step * ($i - 1);
        }
        $correctAnswer = $progression[$positionOfHiddenElement];
        $progression[$positionOfHiddenElement] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    startGame($getData, DESCRIPTION);
}
