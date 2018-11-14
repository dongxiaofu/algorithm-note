<?php
declare(strict_types=1);


function jumpFloor($number)
{
    $i = 0;
    $j = 0;

    $n = 0;
    $tmp = 0;
    $arr = [];

    for($i = 0; $i == 0 || $i <= $number; $i++){
        for($j = 0; 0 == $j || $j <= ceil($number/$j); $j++){
            $tmp = $i + 2 * $j;
            if($tmp == $number){
                $n++;
                $arr[] = [
                    'i' => $i,
                    'j' => $j
                ];
                break;
            }
        }
    }

    var_dump($arr);

    return $n;
}

$n = jumpFloor(2);
var_dump($n);