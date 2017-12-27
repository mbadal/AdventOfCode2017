<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

use AdventOfCode\Reader\Exception\ResourceNotAccessibleException;

abstract class AbstractFileReader implements ReaderInterface {

    /** @var string */
    protected $inputFileName;

    /**
     * @param string $inputFileName
     * @throws ResourceNotAccessibleException
     */
    public function __construct(string $inputFileName) {
        $this->inputFileName = $inputFileName;
        $this->checkResourceAccessibility();
    }

    /**
     * @inheritdoc
     */
    protected function checkResourceAccessibility(): void {
        if (!file_exists($this->inputFileName)) {
            throw new ResourceNotAccessibleException("File: [{$this->inputFileName}] does not exist");
        }

        if (!is_readable($this->inputFileName)) {
            throw new ResourceNotAccessibleException("File: [{$this->inputFileName}] is not readable");
        }
    }
}