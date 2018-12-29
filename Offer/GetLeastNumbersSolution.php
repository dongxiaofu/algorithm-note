<?php
declare(strict_types=1);

namespace App\Offer;


/**
 * 输入n个整数，找出其中最小的K个数。例如输入4,5,1,6,2,7,3,8这8个数字，则最小的4个数字是1,2,3,4,。
 * Class GetLeastNumbersSolution
 * @package App\Offer
 */
class GetLeastNumbersSolution
{
    public function run1(array $input, int $k): array
    {
        $count = count($input);
        if(empty($count) || $k > $count){
            return [];
        }

        $minArr = [];
        for($j = 0; $j < $k; $j++){
            $min = $input[$j];
            $minKey = $j;
            for($i = $j; $i < $count; $i++){
                if($i == $minKey){
                    continue;
                }

                if($min > $input[$i]){
                    $minKey = $i;
                    $tmp = $input[$i];
                    $input[$i] = $min;
                    $min = $tmp;
                }
            }

            $minArr[] = $min;
        }

        return $minArr;
    }

    public function run2(array $input, int $k): array
    {
        $count = count($input);
        if($count < $k){
            return [];
        }
        $sortedInput = $this->quickSort($input);
        $minArr = [];
        for($i = 0; $i < $k; $i++){
            $minArr[] = $sortedInput[$i];
        }

        return $minArr;
    }

    private function quickSort(array $input): array
    {
        $count = count($input);
        if(empty($count)){
            return [];
        }

        if($count == 1){
            return $input;
        }

        $left = [];
        $right = [];
        $flag = $input[0];
        for($i = 1; $i < $count; $i++){
            if($input[$i] > $flag){
                $right[] = $input[$i];
            }else{
                $left[] = $input[$i];
            }
        }

        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        return array_merge($left, [$flag], $right);
    }
}

$class = new GetLeastNumbersSolution();

$input = [];
$k = 0;
$minArr = $class->run1($input, $k);
var_dump($minArr);

$input = [9,7,2,0,5,3];
$k = 3;
$minArr = $class->run1($input, $k);
var_dump($minArr);

$input = [9,7,2,0,5,3];
$k = 30;
$minArr = $class->run1($input, $k);
var_dump($minArr);

echo '<hr />';

$input = [];
$k = 0;
$minArr = $class->run2($input, $k);
var_dump($minArr);

$input = [9,7,2,0,5,3];
$k = 3;
$minArr = $class->run2($input, $k);
var_dump($minArr);

$input = [9,7,2,0,5,3];
$k = 30;
$minArr = $class->run2($input, $k);
var_dump($minArr);