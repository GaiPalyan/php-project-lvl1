<?php

namespace Brain\Games\Helpers;

function randNum(int $from, int $to): int
{
    return mt_rand($from, $to);
}