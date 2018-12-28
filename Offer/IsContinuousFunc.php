<?php
declare(strict_types=1);

function IsContinuous($numbers)
{
    // write code here
    $count = count($numbers);
    if($count == 0){
        return false;
    }

    $numberOfZero = 0;
    $numberInterval = 0;
    $sortedNumbers = quickSort($numbers);
    for($i = 0; $i < $count; $i++){
        if($sortedNumbers[$i] == 0){
            $numberOfZero++;
            continue;
        }

        if($i + 1 == $count){
            continue;
        }

        if($sortedNumbers[$i] == $sortedNumbers[$i+1]){
            return false;
        }

        $numberInterval += $sortedNumbers[$i+1] - $sortedNumbers[$i] - 1;
    }

    if($numberOfZero >= $numberInterval){
        return true;
    }


    return false;

}

function quickSort($numbers)
{
    $count = count($numbers);
    if($count == 0){
        return [];
    }

    if($count == 1){
        return $numbers;
    }

    $left = [];
    $right = [];
    $flag = $numbers[0];
    for($i = 1; $i < $count; $i++){
        if($numbers[$i] < $flag){
            $left[] = $numbers[$i];
        }else{
            $right[] = $numbers[$i];
        }
    }

    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left, [$flag], $right);
}

$numbers = [1,3,2,6,4];
$res = IsContinuous($numbers);
var_dump($res);

$numbers = [0,3,2,6,4];
$res = IsContinuous($numbers);
var_dump($res);

$numbers = [3,0,0,0,0];
$res = IsContinuous($numbers);
var_dump($res);