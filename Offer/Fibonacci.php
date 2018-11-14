<?php
declare(strict_types=1);


function Fibonacci($n)
{
    $arr = [0, 1];

    if($n <= 1){
        return $arr[$n];
    }

    $mixOne = $arr[0];
    $mixTwo = $arr[1];

    for($i = 2; $i <= $n; $i++){
        $fn = $mixOne + $mixTwo;
        $mixOne = $mixTwo;
        $mixTwo = $fn;

    }

    return $fn;
}

$res = Fibonacci(899999999);
var_dump($res);
