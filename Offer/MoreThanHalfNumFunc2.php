<?php
declare(strict_types=1);


function MoreThanHalfNum_Solution($numbers)
{
    // write code here
    if (empty($numbers)) {
        return 0;
    }

    $sortedNumbers = QuickSort($numbers);
    $start = 0;
    $end = count($sortedNumbers);
    $mid = intval(ceil(($start + $end - 1) / 2));
    $midVal = $sortedNumbers[$mid];
    $isExists = countK($sortedNumbers, $start, $end);
    if ($isExists) {
        return $midVal;
    }

    return 0;
}

function countK($data, $start, $end)
{
    $mid = intval(floor(($start + $end) / 2));
    $halfNum = intval(ceil($end / 2));
    $k = $data[$mid];
    $firstKIndex = GetFirstKIndex($data, $start, $end - 1, $k);
    if ($firstKIndex == -1) {
        $firstKIndex = $mid;
    }
    $lastKIndex = GetLastKIndex($data, $start, $end - 1, $k);
    if ($lastKIndex == -1) {
        $lastKIndex = $mid;
    }
    var_dump($data,$lastKIndex, $firstKIndex);
    $n = $lastKIndex - $firstKIndex + 1;
    if ($n >= $halfNum) {
        return true;
    }

    return false;

}

function GetFirstKIndex($data, $start, $end, $k)
{
    if ($start == $end && $data[$start] != $k) {
        return -1;
    }

    $mid = intval(floor(($start + $end) / 2));
    $midVal = $data[$mid];
    if ($midVal == $k) {
        if ($mid == $start || $data[$mid - 1] != $k) {
            return $mid;
        } else {
            $end = $mid - 1;
        }
    } elseif ($k > $midVal) {
        $end = $mid - 1;
    } else {
        $start = $mid + 1;
    }

    return GetFirstKIndex($data, $start, $end, $midVal);
}

function GetLastKIndex($data, $start, $end, $k)
{
    if ($start == $end && $data[$start] != $k) {
        return -1;
    }

    $mid = intval(floor(($start + $end) / 2));
    $midVal = $data[$mid];
    if ($k > $midVal) {
        $end = $mid - 1;
    } elseif ($k == $midVal) {
        if ($mid == $end || $data[$mid + 1] != $k) {
            return $mid;
        } else {
            $start = $mid + 1;
        }
    } else {
        $start = $mid + 1;
    }

    return GetLastKIndex($data, $start, $end, $k);
}

function QuickSort($numbers)
{
    $start = 0;
    $end = count($numbers);
    $sortedNumbers = QuickSortCore($numbers, $start, $end);
    return $sortedNumbers;
}

function QuickSortCore($numbers, $start, $end)
{
    if (empty($numbers)) {
        return [];
    }

    if ($start == $end) {
        return [$numbers[$start]];
    }

    $flag = $numbers[$start];
    $left = [];
    $right = [];
    for ($i = $start + 1; $i < $end; $i++) {
        if ($numbers[$i] > $flag) {
            $left[] = $numbers[$i];
        } else {
            $right[] = $numbers[$i];
        }
    }

    $leftStart = 0;
    $leftEnd = count($left);
    $leftSortedNumbers = QuickSortCore($left, $leftStart, $leftEnd);
    $rightStart = 0;
    $rightEnd = count($right);
    $rightSortedNumbers = QuickSortCore($right, $rightStart, $rightEnd);

    return array_merge($leftSortedNumbers, [$flag], $rightSortedNumbers);
}


$data = [1,2,3,2,2,2,5,4,2];
$target = MoreThanHalfNum_Solution($data);
var_dump($target);
