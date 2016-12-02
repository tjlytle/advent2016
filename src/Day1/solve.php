<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$taxi = new \Advent2016\Day1\Taxi();
$taxi->setDirections(file_get_contents(__DIR__ . '/input.txt'));

echo 'Distance is: ' . $taxi->getDistance() . PHP_EOL;
echo 'HQ is: ' . $taxi->getFirstRevisit() . PHP_EOL;