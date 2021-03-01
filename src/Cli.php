<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greetingsUser()
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May i have your name?');
    line('Hello, ' . $userName);
}
