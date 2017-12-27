<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

interface ReaderInterface {

    /**
     * @return array
     */
    public function read(): array;
}