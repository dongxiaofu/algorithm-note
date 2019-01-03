<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 错误解法
 * 根据牛客网的执行结果，推测题意，不是目前这种代码的算法，即机器人路径必须是连贯的，不能跳跃。
 * 地上有一个m行和n列的方格。一个机器人从坐标0,0的格子开始移动，每一次只能向左，右，上，下四个方向移动一格，但是不能进入行坐标和列坐标的数位之
 * 和大于k的格子。 例如，当k为18时，机器人能够进入方格（35,37），因为3+5+3+7 = 18。但是，它不能进入方格（35,38），因为3+5+3+8 = 19。请
 * 问该机器人能够达到多少个格子？
 * Class MovingCountSolution
 * @package App\Offer
 */
class MovingCountSolution
{
    private $movingCount = 0;

    public function getMovingCount(int $threshold, int $rows, int $cols): int
    {
        if ($rows * $cols == 0 || $rows < 0 || $cols < 0) {
            return 0;
        }

        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col < $cols; $col++) {
                $sum = $this->getCoordinateSum($row, $col);
                if ($sum <= $threshold) {
                    $this->movingCount++;
                } else {
                    break;
                }
            }
        }

        return $this->movingCount;
    }

    private function getCoordinateSum(int $row, int $col): int
    {
        $row = $this->getDigitSum($row);
        $col = $this->getDigitSum($col);

        $sum = $row + $col;

        return $sum;
    }

    private function getDigitSum(int $num): int
    {
        if ($num < 10) {
            return $num;
        }

        $mod = $num % 10;
        $newNum = $num - $mod;
        $decade = intval(floor($newNum / 10));
        $sum = $decade + $mod;

        return $sum;
    }
}

$class = new MovingCountSolution();
$counter = $class->getMovingCount(5, 10, 10);
var_dump($counter);

$class = new MovingCountSolution();
$counter = $class->getMovingCount(10, 1, 100);
var_dump($counter);

$class = new MovingCountSolution();
$counter = $class->getMovingCount(15, 20, 20);
var_dump($counter);