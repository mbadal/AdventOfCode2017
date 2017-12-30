<?php

use AdventOfCode\Direction\Order;
use AdventOfCode\Matrix\MatrixPosition;
use AdventOfCode\Matrix\Facade\MatrixPositionLineNumberFacade;

require __DIR__ . '/../vendor/autoload.php';

$position   = new MatrixPosition();
$facade     = new MatrixPositionLineNumberFacade($position);
$order      = new Order([
    Order::DIRECTION_RIGHT,
    Order::DIRECTION_UP,
    Order::DIRECTION_LEFT,
    Order::DIRECTION_DOWN,
]);
$steps      = [];
$limit      = 312051;
$totalLimit = 312051;
$index      = 1;
$step       = 1;
//for ($i = 1; $i <= $limit; $i++) {
while (true) {
    /*echo 'FIRST: ', "\n";
    var_dump($step, ($step + $index), $index);*/
    if (($step + $index) === $limit) {
        $steps[] = $index;
        break;
    } elseif (($step + $index) > $limit) {
        $steps[] = $limit - $step;
        break;
    } else {
        $steps[] = $index;
    }
    $step += $index;
    //var_dump($step, ($step + $index));

   /* echo 'SECOND: ', "\n";
    var_dump($step);*/
    if (($step + $index) === $limit) {
        $steps[] = $index;
        break;
    } elseif (($step + $index) > $limit) {
        $steps[] = $limit - $step;
        break;
    } else {
        $steps[] = $index;
    }
    $step += $index;
    //var_dump($step);

    $index++;
}

foreach ($steps as $step) {
    $offset = $order->getOffset($step);
    $facade->move($offset[0], $offset[1]);
    var_dump($facade->getCoordinates());
    $order->getNextDirection();
}

var_dump($facade->getCoordinates());
exit;
