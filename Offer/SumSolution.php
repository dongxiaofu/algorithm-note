<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 求1+2+3+...+n，要求不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句（A?B:C）。
 * Class SumSolution
 * @package App\Offer
 */
class SumSolution
{
    public function run1(int $n): int
    {
        $sum = 0;

        if($n == 1){
            $sum = 1;
        }else{
            $sum = $this->run1($n - 1) + $n;
        }

        return $sum;
    }
}