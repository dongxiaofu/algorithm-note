<?php
declare(strict_types=1);

namespace App\Offer;

/**
 *输出所有和为S的连续正数序列。序列内按照从小至大的顺序，序列间按照开始数字从小到大的顺序
 * Class FindContinuousSequence
 * @package App\Offer
 */
class FindContinuousSequence
{
    // 输出所有和为S的连续正数序列。序列内按照从小至大的顺序，序列间按照开始数字从小到大的顺序
    // 蛮力解法
    public function run1(int $sum): array
    {
        $data = [];
        for($i = 1; $i < $sum; $i++){
            $sumTmp = $i;
            for($j = $i + 1; $j < $sum; $j++){
                $sumTmp += $j;
                if($sumTmp == $sum){
                    $data[] = [$i, $j];
                    break;
                }
            }
        }

        $res = [];
        foreach($data as $v){
            $start = $v[0];
            $end = $v[1];
            $str = [];
            for($i = $start; $i <= $end; $i++){
                $str[] = strval($i);
            }
            $res[] = $str;
        }

        return $res;
    }
}

// test
$class = new FindContinuousSequence();
$res = $class->run1(100);
var_dump($res);