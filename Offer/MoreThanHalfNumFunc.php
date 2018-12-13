<?php
declare(strict_types=1);

namespace App\Offer\Func;


function MoreThanHalfNum_Solution($numbers)
{
    // write code here
    if (empty($numbers)) {
        return 0;
    }

    $sortedNumbers = QuickSort($numbers);

    $start = 0;
    $end = count($sortedNumbers);
    $mid = intval(ceil($start + $end - 1) / 2);
    $midVal = $sortedNumbers[$mid];
    $firstKIndex = getFirstKIndex($sortedNumbers, $start, $mid, $midVal);
    if($firstKIndex == -1){
        $firstKIndex = $mid;
    }
    $lastKIndex = getLastIndex($sortedNumbers, $mid, $end - 1, $midVal);
    if($lastKIndex == -1){
        $lastKIndex = $mid;
    }
    $n = $lastKIndex - $firstKIndex + 1;
    $halfN = intval(ceil($end / 2));
    var_dump($sortedNumbers, $n, $halfN);
    if($n >= $halfN){
        return $midVal;
    }

    return 0;
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

function getFirstKIndex($data, $start, $end, $k)
{
    if($start == $end && $k != $data[$start]){
        return -1;
    }
    $mid = intval(($start + $end) / 2);
    $midVal = $data[$mid];
    if($k == $midVal){
        if($mid == $start || $data[$mid-1] != $k){
            return $mid;
        }else{
            $end = $mid;
        }
    }elseif($k > $midVal){
        $end = $mid;
    }else{
        $start = $mid + 1;
    }

    return getFirstKIndex($data, $start, $end, $k);
}

function getLastIndex($data, $start, $end, $k)
{
    if($start == $end && $k != $data[$start]){
        return -1;
    }

    $mid = intval(($start + $end) / 2);
    $midVal = $data[$mid];
    if($k == $midVal){
        if($mid == $end || $data[$mid+1] != $k){
            return $mid;
        }else{
            $start = $mid;
        }
    }elseif($k > $midVal){
        $end = $mid;
    }else{
        $start = $mid + 1;
    }

    return getLastIndex($data, $start, $end, $k);
}

//$data = [1,2,3,2,2,2,5,4,2,5,5,5,5,5,5,5,5];
//$target = MoreThanHalfNum_Solution($data);
////var_dump($target);
//
//$data = [1,2,3,2,4,2,5,2,3];
//$target = MoreThanHalfNum_Solution($data);
////var_dump($target);

$data = [1,2,3,2,2,2,5,4,2];
$target = MoreThanHalfNum_Solution($data);
var_dump($target);