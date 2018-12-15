<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 一个整型数组里除了两个数字之外，其他的数字都出现了偶数次。请写程序找出这两个只出现一次的数字。
 * Class FindNumsAppearOnce
 * @package App\Offer
 */
class FindNumsAppearOnce
{
    public function run1(array $data): array
    {
        $res = [];
        $newData = $this->countValue($data);
        foreach($newData as $k => $v){
            if($v == 1){
                $res[] = $k;
            }
        }

        return $res;
    }

    private function countValue(array $data): array
    {
        $res = [];
        foreach($data as $v){
            if(isset($res[$v])){
                $res[$v] = $res[$v] + 1;
            }else{
                $res[$v] = 1;
            }
        }

        return $data;
    }
}