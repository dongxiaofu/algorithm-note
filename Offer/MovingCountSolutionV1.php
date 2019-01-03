<?php
declare(strict_types=1);

namespace App\Offer;

/**
 *  Fatal error: Uncaught Error: Maximum function nesting level of '10' reached, aborting!
 * 未掌握 计算递归层次的方法
 * Class MovingCountSolutionV1
 * @package App\Offer
 */
class MovingCountSolutionV1
{
    private $visited = [];

    public function getMovingCount(int $threshold, int $rows, int $cols): int
    {
        if ($threshold < 0 || $rows < 0 || $cols < 0) {
            return 0;
        }

        $total = $rows * $cols;
        for ($i = 0; $i < $total; $i++) {
            $this->visited[$i] = false;
        }

        $count = $this->getMovingCountCore($threshold, $rows, $cols, 0, 0);

        return $count;
    }

    private function getMovingCountCore(int $threshold, int $rows, int $cols, int $row, int $col): int
    {
        if ($row >= $rows || $col >= $cols || $row < 0 || $col < 0) {
            return 0;
        }

        $cur = $cols * $row + $col;
        if ($this->visited[$cur] || !$this->checkSum($threshold, $row, $col)) {
            return 0;
        }

        $this->visited[$cur] = true;

        return (1 + $this->getMovingCountCore($threshold, $rows, $cols, $row - 1, $col)
            + $this->getMovingCountCore($threshold, $rows, $cols, $row + 1, $col)
            + $this->getMovingCountCore($threshold, $rows, $cols, $row, $col - 1)
            + $this->getMovingCountCore($threshold, $rows, $cols, $row, $col + 1));
    }

    private function checkSum(int $threshold, int $row, int $col): bool
    {
        $sum = 0;

        $rowLength = strlen(strval($row));
        $colLength = strlen(strval($col));

        for ($i = 0; $i < $rowLength; $i++) {
            $sum += intval((strval($row))[$i]);
        }

        for ($i = 0; $i < $colLength; $i++) {
            $sum += intval((strval($col))[$i]);
        }

        if ($sum > $threshold) {
            return false;
        }

        return true;
    }
}

$class = new MovingCountSolutionV1();
$counter = $class->getMovingCount(5, 5, 5);
var_dump($counter);

$class = new MovingCountSolutionV1();
$counter = $class->getMovingCount(5, 10, 10);
var_dump($counter);

$class = new MovingCountSolutionV1();
$counter = $class->getMovingCount(10, 1, 100);
var_dump($counter);

$class = new MovingCountSolutionV1();
$counter = $class->getMovingCount(15, 20, 20);
var_dump($counter);