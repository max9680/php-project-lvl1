#!/usr/bin/php
<?php

require_once __DIR__ .'/../vendor/autoload.php';

use function BrainGames\Cli\line;
use function BrainGames\Cli\prompt;

line("Welcome to the Brain Game!\n");
$name = prompt("May I have your name?\n");
line("Hello, %s!\n", $name);
