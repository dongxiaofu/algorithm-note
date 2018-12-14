<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class FindGreatestSumOfSubArray
 * @package App\Offer
 * HZ偶尔会拿些专业问题来忽悠那些非计算机专业的同学。今天测试组开完会后,他又发话了:在古老的一维模式识别中,常常需要计算连续子向量的最大和,当向
 * 量全为正数的时候,问题很好解决。但是,如果向量中包含负数,是否应该包含某个负数,并期望旁边的正数会弥补它呢？例如:{6,-3,-2,7,-15,1,2,2},连
 * 续子向量的最大和为8(从第0个开始,到第3个为止)。
 * 给一个数组，返回它的最大连续子序列的和，你会不会被他忽悠住？(子向量的长度至少是1)
 */
class FindGreatestSumOfSubArray
{
    /**
     * 时间复杂度O(n²)
     * 连求所有的子数组的和这种蛮力写法，我都需要思考
     * 先找出所有的子数组的和，组成数组
     * 在这类数组中再找出最大值
     * @param array $data
     * @return int
     */
    public function run1(array $data): int
    {
        $sums = $this->getAllSum($data);
        $max = $this->getMax($sums);

        return $max;
    }

    private function getAllSum(array $data): array
    {
        $end = count($data);
        $res = [];
        $res2 = [];
        for($i = 0; $i < $end; $i++){
            $sum = $data[$i];
            $res[] = $sum;
            $subArr = [$sum];

            for($j = $i+1; $j < $end; $j++){
                $sum += $data[$j];
                $res[] = $sum;
                $subArr[] = $data[$j];
                $res2[$sum] = $subArr;
            }
        }
        var_dump($res2);
        return $res;
    }

    private function getMax(array $sums): int
    {
        if(empty($sums)){
            return -1;
        }

        $max = $sums[0];
        $count = count($sums);
        for($i = 1;$i < $count; $i++){
            if($sums[$i] > $max){
                $max = $sums[$i];
            }
        }

        return $max;
    }
}


$class = new FindGreatestSumOfSubArray();
$data = [6,-3,-2,7,99,1,2,2];
$max = $class->run1($data);
var_dump($max);

$data = [1,-2,3,10,-4,7,2,-5];
$max = $class->run1($data);
var_dump($max);