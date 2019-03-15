<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "What number is missing in the progression?\n";
const SIZE_OF_PROGRESSION = 10;

function game()
{
    $data = function () {
        $begin = rand(1, 5);
        $step = rand(1, 5);
        $positionOfHiddenElement = rand(0, SIZE_OF_PROGRESSION - 1);
        $progression = [];
        for ($i = 1; $i <= SIZE_OF_PROGRESSION; $i++) {
            $progression[] = $begin + $step * ($i - 1);
        }
        $correctAnswer = $progression[$hiddenElement];
        $progression[$hiddenElement] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    startGame($data, DESCRIPTION);
}
