<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 给定一个数组和滑动窗口的大小，找出所有滑动窗口里数值的最大值。例如，如果输入数组{2,3,4,2,6,2,5,1}及滑动窗口的大小3，那么一共存在6个滑动
 * 窗口，他们的最大值分别为{4,4,6,6,6,5}； 针对数组{2,3,4,2,6,2,5,1}的滑动窗口有以下6个： {[2,3,4],2,6,2,5,1}，
 * {2,[3,4,2],6,2,5,1}， {2,3,[4,2,6],2,5,1}， {2,3,4,[2,6,2],5,1}， {2,3,4,2,[6,2,5],1}， {2,3,4,2,6,[2,5,1]}。
 * Class MaxInWindowsV1
 * @package App\Offer
 */
class MaxInWindowsV1
{
    public function getMaxInWindows(array $nums, int $size): array
    {
        $count = count($nums);
        if (empty($count)) {
            return [];
        }

        if ($size > $count) {
            return [];
        }

        $windows = $this->getWindows($nums, $size);
        $maxs = [];
        foreach ($windows as $window) {
            $maxs[] = $this->getMax($window);
        }

        return $maxs;
    }

    private function getWindows(array $nums, int $size): array
    {
        $windows = [];
        $count = count($nums);
        if (empty($count)) {
            return [];
        }

        if ($size > $count) {
            return [];
        }

        $end = $count - $size;
        for ($i = 0; $i <= $end; $i++) {
            $window = [];
            for ($j = 0; $j < $size; $j++) {
                $window[] = $nums[$i + $j];
            }
            $windows[] = $window;
        }

        return $windows;
    }

    private function getMax(array $nums): ?int
    {
        $count = count($nums);
        if (empty($count)) {
            return null;
        }

        $max = $nums[0];
        for ($i = 1; $i < $count; $i++) {
            if ($nums[$i] > $max) {
                $max = $nums[$i];
            }
        }

        return $max;
    }
}

$class = new MaxInWindowsV1();
$nums = [2, 3, 4, 2, 6, 2, 5, 1];
$size = 3;
$res = $class->getMaxInWindows($nums, $size);
var_dump($res);