<?php
declare(strict_types=1);

namespace App\Offer;

/**
 *
 * 输入一个递增排序的数组和一个数字S，在数组中查找两个数，使得他们的和正好是S，如果有多对数字的和等于S，输出两个数的乘积最小的。
 * Class FindNumbersWithSum
 * @package App\Offer
 */
class FindNumbersWithSum
{
    public function run1(array $array, int $sum): array
    {
        $count = count($array);
        $data = [];

        for($i = 0; $i < $count; $i++){
            for($j = $i + 1; $j < $count; $j++){
                if($array[$i] + $array[$j] == $sum){
                    $data[] = [$array[$i], $array[$j]];
                }
            }
        }

        $num = count($data);
        if($num == 0){
            return [];
        }

        if($num == 1){
            return $data[0];
        }

        $firstProduct = $data[0][0] * $data[0][1];
        $min = $firstProduct;
        $minK = -1;
        foreach($data as $k => $v){
            $product = $v[0] * $v[1];
            if($product < $min){
                $min = $product;
                $minK = $k;
            }
        }

        if($min != $firstProduct){
            return $data[$minK];
        }

        return $data[0];
    }
}

// test