<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class MoreThanHalfNum
 * @package App\Offer
 * 数组中有一个数字出现的次数超过数组长度的一半，请找出这个数字。
 * 例如输入一个长度为9的数组{1,2,3,2,2,2,5,4,2}。由于数字2在数组中出现了5次，超过数组长度的一半，因此输出2。如果不存在则输出0。
 */
class MoreThanHalfNum
{
    public function run1(array $data): int
    {
        $length = count($data);
        $half = intval(ceil($length / 2));
        var_dump($length, $half);
        $res = $this->countValue($data);
        foreach ($res as $k => $v) {
            if ($v >= $half) {
                return $k;
            }
        }

        return 0;
    }

    private function countValue(array $data): array
    {
        $newData = [];

        foreach ($data as $v) {
            if (array_key_exists($v, $newData)) {
                $newData[$v] = $newData[$v] + 1;
            } else {
                $newData[$v] = 1;
            }
        }

        return $newData;
    }

    public function run2(array $data): int
    {
        if (empty($data)) {
            return 0;
        }

        $sortedData = $this->quickSort($data);
        var_dump($sortedData);
        $start = 0;
        $end = count($sortedData);
        $halfNum = intval(ceil($end / 2));
        $mid = $halfNum - 1;
        $midVal = $sortedData[$mid];
        $firstKIndex = $this->getFirstKIndex($sortedData, $start, $end - 1, $midVal);
        if ($firstKIndex == -1) {
            $firstKIndex = $mid;
        }
        $lastKIndex = $this->getLastKIndex($sortedData, $start, $end - 1, $midVal);
        if ($lastKIndex == -1) {
            $lastKIndex = $mid;
        }
        $n = $lastKIndex - $firstKIndex + 1;
        var_dump($firstKIndex, $lastKIndex);
        if ($n >= $halfNum) {
            return $midVal;
        }

        return 0;
    }

    private function getFirstKIndex(array $data, int $start, int $end, int $k): int
    {
        if ($start == $end && $data[$start] != $k) {
            return -1;
        }

        $mid = intval(ceil(($start + $end) / 2));
        $midVal = $data[$mid];
        if ($k == $midVal) {
            if ($mid == $start || $data[$mid - 1] != $k) {
                return $mid;
            } else {
                $end = $mid - 1;
            }
        } elseif ($k > $midVal) {
            $start = $mid + 1;
        } else {
            $end = $mid - 1;
        }

        return $this->getFirstKIndex($data, $start, $end, $k);
    }

    private function getLastKIndex(array $data, int $start, int $end, int $k): int
    {
        if ($start == $end && $data[$start] != $k) {
            return -1;
        }

        $mid = intval(ceil(($start + $end) / 2));
        $midVal = $data[$mid];
        if ($k == $midVal) {
            if ($mid == $end || $data[$mid + 1] != $k) {
                return $mid;
            } else {
                $start = $mid + 1;
            }
        } elseif ($k > $midVal) {
            $start = $mid + 1;
        } else {
            $end = $mid - 1;
        }

        return $this->getLastKIndex($data, $start, $end, $k);
    }

    public function quickSort(array $data): array
    {
        $start = 0;
        $end = count($data);
        $sortedData = $this->quickSortCore($data, $start, $end);

        return $sortedData;
    }

    public function quickSortCore(array $data, int $start, int $end): array
    {
        if (empty($data)) {
            return [];
        }

        if ($start == $end) {
            return [$data[$start]];
        }

        $flag = $data[$start];
        $left = [];
        $right = [];
        for ($i = $start + 1; $i < $end; $i++) {
            if ($data[$i] < $flag) {
                $left[] = $data[$i];
            } else {
                $right[] = $data[$i];
            }
        }

        $leftStart = 0;
        $leftEnd = count($left);
        $leftSortedData = $this->quickSortCore($left, $leftStart, $leftEnd);

        $rightStart = 0;
        $rightEnd = count($right);
        $rightSortedData = $this->quickSortCore($right, $rightStart, $rightEnd);

        return array_merge($leftSortedData, [$flag], $rightSortedData);
    }
}

// test
$class = new MoreThanHalfNum();
//$data = [1,2,3,2,2,2,5,4,2];
//$n = $class->run1($data);
//var_dump($n);
//
//$data = [1,2,3,2,2,2,5,4,2,5,5,5,5,5,5,5,5];
//$n = $class->run1($data);
//var_dump($n);
//
//$data = [1,2,3,2,2,2,5,4,2,5,5,5,5,5,5,5,5];
//var_dump(count($data));
//$n = $class->run2($data);
//var_dump($n);
//
//$data = [1,2,3,2,4,2,5,2,3];
////var_dump(count($data));
//$n = $class->run2($data);
//var_dump($n);

$data = [2, 2, 3, 2, 4, 2, 5, 1, 3];
$n = $class->run2($data);
var_dump($n);



$data = [1,2,3,2,2,2,5,4,2];
$n = $class->run2($data);
var_dump($n);