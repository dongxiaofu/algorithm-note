<?php
declare(strict_types=1);

namespace App\Offer;

/**
 *
 * 给定一个数组A[0,1,...,n-1],请构建一个数组B[0,1,...,n-1],其中B中的元素B[i]=A[0]*A[1]*...*A[i-1]*A[i+1]*...*A[n-1]。
 * 不能使用除法
 * Class Multiply
 * @package App\Offer
 */
class Multiply
{
    public function run1(array $data): array
    {
        $newData = [];
        $count = count($data);
        for($i = 0; $i < $count; $i++){
            $value = 1;
            for($j = 0; $j < $count; $j++){
                if($j == $i){
                    continue;
                }
                $value *= $data[$j];
            }

            $newData[] = $value;
        }

        return $newData;
    }
}

// test
$class = new Multiply();
$data = [1,2,3,4,5];
$res = $class->run1($data);
var_dump($res);