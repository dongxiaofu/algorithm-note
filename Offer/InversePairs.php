<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class InversePairs
 * @package App\Offer
 * 在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。
 * 输入一个数组,求出这个数组中的逆序对的总数P。并将P对1000000007取模的结果输出。 即输出P%1000000007
 *
 * 错误：
 * 1.比较的两个数字，不需要位置连续
 */

class InversePairs
{
    public const BASE = 1000000007;

    public function run1(array $arr): int
    {
        $num = 0;
        $count = count($arr);
        for($i = 0 ; $i < $count-1 ; $i++){

            for($j = $i + 1; $j < $count; $j++){
                if($arr[$i] > $arr[$j]){
                    $num++;
                }
            }

        }

        var_dump($num);

        return $num % self::BASE;
    }


}

$class = new InversePairs();
$arr = [1,2,3,4,5,6,7,0];
$res = $class->run1($arr);
var_dump($res);

$arr = [7,5,6,4];
$res = $class->run1($arr);
var_dump($res);

$arr = [364,637,341,406,747,995,234,971,571,219,993,407,416,366,315,301,601,650,418,355,460,505,360,965,516,648,727,667,465,849,455,181,486,149,588,233,144,174,557,67,746,550,474,162,268,142,463,221,882,576,604,739,288,569,256,936,275,401,497,82,935,983,583,523,697,478,147,795,380,973,958,115,773,870,259,655,446,863,735,784,3,671,433,630,425,930,64,266,235,187,284,665,874,80,45,848,38,811,267,575];
$res = $class->run1($arr);
var_dump($res);


function InversePairs($data)
{
    // write code here
    return mergeSort($data) % 1000000007;
}

function mergeSort(&$arr) {
    $len = count($arr);
    $sum = 0;
    mSort($arr, 0, $len-1, $sum);
    return $sum;
}

function mSort(&$arr, $left, $right, &$sum) {
    if($left < $right) {
        $center = ($left+$right) >> 1;
        mSort($arr, $left, $center, $sum);
        mSort($arr, $center+1, $right, $sum);
        mergeArray($arr, $left, $center, $right, $sum);
    }
}

function mergeArray(&$arr, $l, $m, $r, &$sum) {
    $i = $l;
    $j = $m+1;
    while($i<=$m && $j<=$r) {
        if($arr[$i] <= $arr[$j]) {
            $temp[] = $arr[$i++];
        } else {
            $sum += $m - $i + 1;
            $temp[] = $arr[$j++];
        }
    }
    while($i <= $m) {
        $temp[] = $arr[$i++];
    }
    while($j <= $r) {
        $temp[] = $arr[$j++];
    }
    for($i=0, $len=count($temp); $i<$len; $i++) {
        $arr[$l+$i] = $temp[$i];
    }
}

$arr = [1,2,3,4,5,6,7,0];
$res = InversePairs($arr);
var_dump($res);
