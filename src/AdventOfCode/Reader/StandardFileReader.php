<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

use AdventOfCode\Reader\Exception\ResourceNotAccessibleException;

class StandardFileReader implements ReaderInterface {

    /** @var string */
    private $inputFileName;

    /**
     * @param string $inputFileName
     */
    public function __construct(string $inputFileName) {
        $this->inputFileName = $inputFileName;
    }

    /**
     * @inheritdoc
     */
    public function read(): array {
        $this->checkResourceAccessibility();
        $inputString = file_get_contents($this->inputFileName);

        return str_split($inputString);
    }

    /**
     * @inheritdoc
     */
    public function checkResourceAccessibility(): void {
        if (!file_exists($this->inputFileName)) {
            throw new ResourceNotAccessibleException("File: [{$this->inputFileName}] does not exist");
        }

        if (!is_readable($this->inputFileName)) {
            throw new ResourceNotAccessibleException("File: [{$this->inputFileName}] is not readable");
        }
    }
}