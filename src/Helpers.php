<?php

namespace Brain\Games\Helpers;

function getRandNum(int $from, int $to): int
{
    return mt_rand($from, $to);
}
