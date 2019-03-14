<?php

namespace BrainGames\Progression;

use function BrainGames\GameEngine\startGame;

const DESCRIPTION = "What number is missing in the progression?\n";
const SIZE_OF_PROGRESSION = 10;

function game()
{
    $data = function () {
        $beginOfProgression = rand(1, 5);
        $stepOfProgression = rand(1, 5);
        $hiddenElement = rand(0, 9);
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
