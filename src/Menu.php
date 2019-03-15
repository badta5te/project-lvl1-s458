<?php

namespace BrainGames\Menu;

use function cli\line;
use function cli\prompt;
use function cli\menu as cliMenu;
use function BrainGames\Even\game as gameEven;
use function BrainGames\Calc\game as gameCalc;
use function BrainGames\Gcd\game as gameGcd;
use function BrainGames\Progression\game as gameProgression;
use function BrainGames\Prime\game as gamePrime;

function menu()
{
    $menu = [
        'BrainGames\Even' => 'Even',
        'BrainGames\Calc' => 'Calc',
        'BrainGames\Gcd' => 'Gcd',
        'BrainGames\Progression' => 'Progression',
        'BrainGames\Prime' => 'Prime',
        'quit' => 'Quit',
    ];

    $choice = cliMenu($menu, null, 'Choose the game');
    line();
    switch ($choice) {
        case 'BrainGames\Even':
            return gameEven();
        case 'BrainGames\Calc':
            return gameCalc();
        case 'BrainGames\Gcd':
            return gameGcd();
        case 'BrainGames\Progression':
            return gameProgression();
        case 'BrainGames\Prime':
            return gamePrime();
        case 'quit':
            exit;
    }
}
