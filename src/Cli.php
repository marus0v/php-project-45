<?php

require_once(__DIR__ . 'vendor/wp-cli/php-cli-tools/lib/cli/cli.php');

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcomeUser($name)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
