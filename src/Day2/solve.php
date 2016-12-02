<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$keypad = new \Advent2016\Day2\Keypad();
$keypad->setDirections(file_get_contents(__DIR__ . '/input.txt'));

echo 'Code is: ' . $keypad->getCode() . PHP_EOL;