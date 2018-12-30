<?php
declare(strict_types=1);

$nums = [];

function Insert($num)
{
    // write code here
    global $nums;
    $count = count($nums);
    for($i = $count - 1; $i >= 0; $i--){
        if($num >= $nums[$i]){
            break;
        }else{
            $nums[$i+1] = $nums[$i];
        }
    }

    $nums[$i+1] = $num;

    return $nums;
}
function GetMedian(){
    // write code here
    global $nums;

    $count = count($nums);
    if(empty($count)){
        return null;
    }

    $start = 0;
    $end = $count - 1;
    if($count % 2){
        $mid = ($start + $end) / 2;
        $target = $nums[$mid];
        return $target;
    }else{


        $midRight = ($start + $end + 1) / 2;
        $midLeft = $midRight - 1;
        $target = ($nums[$midLeft] + $nums[$midRight]) / 2;
        return $target;
    }
}


Insert(1);
Insert(2);
var_dump($nums);
$target = GetMedian();
var_dump($target);