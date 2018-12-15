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

//        var_dump($num);

        return $num % self::BASE;
    }

    /**
     * 有难度，忘记了思路，回忆起思路后，不知道怎么实现为代码
     * @param array $data
     * @return int
     */
    public function run2(array $data): int
    {
        $copy = $data;
        $length = count($data);
        $num = $this->inversePairesCore($data,$copy, 0,  $length-1);
        return $num % self::BASE;
    }


    private function inversePairesCore(
        array &$data,
        array &$copy,
        int $start,
        int $end
    ): int
    {
        // 基准条件
        if($start == $end){

            $copy[$start] = $data[$end];
            return 0;
        }

        $length = intval(floor(($end - $start) / 2));
        $left = $this->inversePairesCore($copy, $data, $start, $start + $length);
        $right = $this->inversePairesCore($copy, $data, $start + $length + 1, $end);

        $count = 0;
        $i = $start + $length;
        $j = $end;
        // $copy的key用$end或$indexCopy都可以
        $indexCopy = $end;

        while($i >= $start && $j >= $start + $length + 1){
            if($data[$i] > $data[$j]){
                /**
                 * 不能用$end代替$j，因为统计的数量是$j（包括$j）之前的元素个数
                 */
                $count += $j - ($start + $length + 1) + 1;
                $copy[$indexCopy--] = $data[$i--];
            }else{
                $copy[$indexCopy--] = $data[$j--];
            }
        }

        for( ; $i >= $start; $i--){
            $copy[$indexCopy--] = $data[$i];
        }

        for( ; $j >= $start + $length + 1; $j--){
            $copy[$indexCopy--] = $data[$j];
        }

        return $left + $count + $right;
    }


}

$class = new InversePairs();
$arr = [1,2,3,4,5,6,7,0];
$res = $class->run1($arr);
//var_dump($res);

$arr = [7,5,6,4];
$res = $class->run1($arr);
//var_dump($res);

$arr2 = [364,637,341,406,747,995,234,971,571,219,993,407,416,366,315,301,601,650,418,355,460,505,360,965,516,648,727,667,465,849,455,181,486,149,588,233,144,174,557,67,746,550,474,162,268,142,463,221,882,576,604,739,288,569,256,936,275,401,497,82,935,983,583,523,697,478,147,795,380,973,958,115,773,870,259,655,446,863,735,784,3,671,433,630,425,930,64,266,235,187,284,665,874,80,45,848,38,811,267,575];
$res = $class->run1($arr);
//var_dump($res);

$arr = [7,5,6,4];
$res = $class->run2($arr);
var_dump($res);

$res = $class->run2($arr2);
var_dump($res);



