<?php declare(strict_types=1);

namespace AdventOfCode\Matrix\Facade;

use AdventOfCode\Matrix\MatrixPosition;

class MatrixPositionLineNumberFacade {

    /** @var MatrixPosition */
    private $matrixPosition;

    /**
     * @param MatrixPosition $matrixPosition
     */
    public function __construct(MatrixPosition $matrixPosition) {
        $this->matrixPosition = $matrixPosition;
    }

    /**
     * @param int $offsetX
     * @param int $offsetY
     *
     * @return $this
     */
    public function move(int $offsetX = 0, int $offsetY = 0): self {
        if ($offsetX > 0) {
            $this->matrixPosition->moveRight($offsetX);
        } else {
            $this->matrixPosition->moveLeft($offsetX);
        }

        if ($offsetY > 0) {
            $this->matrixPosition->moveUp($offsetY);
        } else {
            $this->matrixPosition->moveDown($offsetY);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getCoordinates(): array {
        return [$this->matrixPosition->getX(), $this->matrixPosition->getY()];
    }
}