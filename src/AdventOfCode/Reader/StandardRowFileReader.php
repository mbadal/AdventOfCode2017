<?php declare(strict_types=1);

namespace AdventOfCode\Reader;

class StandardRowFileReader extends AbstractFileReader {

    /**
     * @inheritdoc
     */
    public function read(): array {
        $rawFileContent = file_get_contents($this->inputFileName);

        $rows        = explode("\n", $rawFileContent);
        $fileContent = [];
        foreach ($rows as $row) {
            $row = preg_replace('/\s{1,}/', ' ', $row);
            $fileContent[] = explode(' ', $row);
        }

        return $fileContent;
    }

}