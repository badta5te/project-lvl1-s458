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
        $hiddenElement = rand(0, SIZE_OF_PROGRESSION - 1);
        $progression = [];
        $currentElement = $beginOfProgression;
        for ($i = 0; $i < SIZE_OF_PROGRESSION; $i++) {
            $progression[] = $currentElement;
            $currentElement += $stepOfProgression;
        }
        $correctAnswer = $progression[$hiddenElement];
        $progression[$hiddenElement] = '..';
        $question = implode(' ', $progression);
        return [$question, $correctAnswer];
    };
    startGame($data, DESCRIPTION);
}
