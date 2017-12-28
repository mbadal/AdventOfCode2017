<?php

use AdventOfCode\Reader\StandardRowFileReader;

require __DIR__ . '/../vendor/autoload.php';

$reader      = new StandardRowFileReader(__DIR__ . '/input.txt');
$fileContent = $reader->read();

$result = 0;
foreach ($fileContent as $row) {
    $min = min($row);
    $max = max($row);

    $result += $max - $min;
}

echo $result, "\n";
$result = 0;
foreach ($fileContent as $row) {
    foreach ($row as $item) {
        foreach ($row as $compareItem) {
            if ($compareItem <= $item) {
                continue;
            }

            if ((int)$compareItem % (int)$item === 0) {
                $result+= $compareItem / $item;
                break;
            }
        }
    }
}
echo $result, "\n";