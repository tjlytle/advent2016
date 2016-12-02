<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$keypad = new \Advent2016\Day2\Keypad();
$keypad->setDirections(file_get_contents(__DIR__ . '/input.txt'));

$keypad->setKeys([
    ['1', '2', '3'],
    ['4', '5', '6'],
    ['7', '8', '9']
]);

echo 'Imaginary code is: ' . $keypad->getCode('5') . PHP_EOL;

$keypad->setKeys([
    [null, null, '1', null, null],
    [null,  '2', '3',  '4', null],
    ['5',   '6', '7',  '8',  '9'],
    [null,  'A', 'B',  'C', null],
    [null, null, 'D', null, null],
]);

echo 'Real code is: ' . $keypad->getCode('5') . PHP_EOL;