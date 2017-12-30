<?php declare(strict_types=1);

namespace AdventOfCode\Matrix;

class MatrixPosition {
    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x = 0, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return $this
     */
    public function moveTo(int $x, int $y): self {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function moveUp(int $offset): self {
        $this->y += $offset;

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function moveDown(int $offset): self {
        $this->y += $offset;

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function moveLeft(int $offset): self {
        $this->x += $offset;

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function moveRight(int $offset): self {
        $this->x += $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getX(): int {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int {
        return $this->y;
    }
}