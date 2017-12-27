<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

use AdventOfCode\Reader\Exception\ResourceNotAccessibleException;

interface ReaderInterface {

    /**
     * @return array
     */
    public function read(): array;

    /**
     * @throws ResourceNotAccessibleException
     * @return void
     */
    public function checkResourceAccessibility(): void;
}