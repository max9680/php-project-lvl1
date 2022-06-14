<?php

namespace BrainGames\Cli;

function line($text, $var1 = null)
{
    if ($var1 != null) {
        $text = substr_replace($text, $var1, strpos($text, "%s"), 2);
    }
        echo ("$text\n");
}

function prompt($text)
{
        echo "$text\n";
        return trim(fgets(STDIN));
}
