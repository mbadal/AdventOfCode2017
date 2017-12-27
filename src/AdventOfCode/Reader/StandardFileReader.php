<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

class StandardFileReader extends AbstractFileReader {
    /**
     * @inheritdoc
     */
    public function read(): array {
        $inputString = file_get_contents($this->inputFileName);

        return str_split($inputString);
    }
}