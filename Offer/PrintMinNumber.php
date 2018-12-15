<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class PrintMinNumber
 * @package App\Offer
 *
 * 输入一个正整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。
 * 例如输入数组{3，32，321}，则打印出这三个数字能排成的最小数字为321323
 */
class PrintMinNumber
{
    /**
     * 利用了PHP语法中数字与字符串的转换，不具有通用性
     * 时间复杂度O(n²)
     * @param array $data
     * @return int
     */
    public function run1(array $data): int
    {
        $numbers = $this->getAllNumber($data);
        var_dump($numbers);
        $min = $this->getMin($numbers);

        return $min;
    }

    private function getAllNumber(array $data): array
    {
        $numbers = [];
        $count = count($data);
        for($i = 0; $i < $count; $i++){
            $numberStrs = strval($data[$i]);
            for($j = 0; $j < $count; $j++){
                if($j == $i){
                    continue;
                }
                $numberStr = strval($data[$j]);
                $numberStrs .= $numberStr;
            }
            $numbers[] = intval($numberStrs);

            $numberStrs = strval($data[$i]);
            for($j = $count - 1; $j >= 0; $j--){
                if($j == $i){
                    continue;
                }
                $numberStr = strval($data[$j]);
                $numberStrs .= $numberStr;
            }
            $numbers[] = intval($numberStrs);
        }

        return $numbers;
    }


    private function getMin(array $data): int
    {
        $min = $data[0];
        $count = count($data);

        for($i = 1; $i < $count; $i++){
            if($data[$i] < $min){
                $min = $data[$i];
            }
        }

        return $min;
    }
}

$class = new PrintMinNumber();
$data = [3,32,321];
$res = $class->run1($data);
var_dump($res);

$data = [3,5,1,4,2];
$res = $class->run1($data);
var_dump($res);