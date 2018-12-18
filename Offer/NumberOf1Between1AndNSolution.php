<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 求出1~13的整数中1出现的次数,并算出100~1300的整数中1出现的次数？为此他特别数了一下1~13中包含1的数字有1、10、11、12、13因此共出现6次,
 * 但是对于后面问题他就没辙了。ACMer希望你们帮帮他,并把问题更加普遍化,可以很快的求出任意非负整数区间中1出现的次数（从1 到 n 中1出现的次数）
 * Class NumberOf1Between1AndNSolution
 * @package App\Offer
 */
class NumberOf1Between1AndNSolution
{
    // 时间复杂度太大
    public function run1(int $n): int
    {
        $count = 0;

        for($i = 1; $i <= $n; $i++){
            $numberStr = strval($i);
            $length = strlen($numberStr);
            for($j = 0; $j < $length; $j++){
                if($numberStr[$j] == '1'){
                    $count++;
                }
            }
        }

        return $count;
    }
}

// test
$class = new NumberOf1Between1AndNSolution();
$res = $class->run1(13);
var_dump($res);