<?php declare(strict_types=1);

namespace AdventOfCode\Direction;

class Order {
    const DIRECTION_LEFT  = 'left';
    const DIRECTION_RIGHT = 'right';
    const DIRECTION_UP    = 'up';
    const DIRECTION_DOWN  = 'down';

    /** @var string */
    private $direction;

    /** @var array */
    private $directionsOrder = [];

    /**
     * @param array $directionsOrder
     */
    public function __construct(array $directionsOrder = []) {
        $this->directionsOrder = $directionsOrder;
        $this->direction       = current($this->directionsOrder);
    }

    /**
     * @return string
     */
    public function getNextDirection(): string {
        $index = array_search($this->direction, $this->directionsOrder);
        if (++$index === sizeof($this->directionsOrder)) {
            $index = 0;
        }

        $this->direction = $this->directionsOrder[$index];

        return $this->direction;
    }

    /**
     * @return string
     */
    public function getDirection(): string {
        return $this->direction;
    }

    /**
     * @param int $step
     *
     * @return array
     */
    public function getOffset(int $step): array {
        if (static::isDirectionHorizontal($this->direction)) {
            return [$this->direction === static::DIRECTION_LEFT ? (-1 * $step): $step, 0];
        }

        if (static::isDirectionVertical($this->direction)) {
            return [0 ,$this->direction === static::DIRECTION_DOWN ? (-1 * $step): $step];
        }
    }

    /**
     * @param string $direction
     *
     * @return bool
     */
    private static function isDirectionVertical(string $direction): bool {
        return ($direction === static::DIRECTION_UP || $direction === static::DIRECTION_DOWN);
    }

    /**
     * @param string $direction
     *
     * @return bool
     */
    private static function isDirectionHorizontal(string $direction): bool {
        return ($direction === static::DIRECTION_LEFT || $direction === static::DIRECTION_RIGHT);
    }
}