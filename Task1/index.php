<?php

use AdventOfCode\Reader\StandardFileReader;

require __DIR__ . '/../vendor/autoload.php';

$reader      = new StandardFileReader(__DIR__ . '/input.txt');
$fileContent = $reader->read();

$result      = 0;
$prevElement = $fileContent[sizeof($fileContent) - 1];
foreach ($fileContent as $character) {
    if ($prevElement === $character) {
        $result += (int)$character;
    }

    $prevElement = $character;
}

echo $result;
echo "\n";

$result      = 0;
$sizeOfArray = sizeof($fileContent);
$nextOffset  = $sizeOfArray / 2;
foreach ($fileContent as $index => $character) {
    $nextIndex = $index + $nextOffset;
    if ($nextIndex > ($sizeOfArray - 1)) {
        $nextIndex = ($nextIndex % ($sizeOfArray - 1)) - 1;
    }

    if ((int)$character === (int)$fileContent[$nextIndex]) {
        $result += (int)$character;
    }
}

echo $result;