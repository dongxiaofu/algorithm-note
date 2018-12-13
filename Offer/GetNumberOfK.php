<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class GetNumberOfK
 * @package App\Offer
 * 统计一个数字在排序数组中出现的次数。
 */
class GetNumberOfK
{

    /**
     * 时间复杂度 O(n㏒n)
     * 独立想出来的
     * 二分法
     * 如果找到等于$k的元素A，则蛮力统计以A为中间点的这段元素中出现A的次数
     * 如果没有找到等于$k的元素，就继续二分查找；
     * 递归的基准条件是，1>找到等于$k的元素；2>只有一个元素
     * @param array $data
     * @param int $k
     * @return int
     */
    public function run1(array $data, int $k): int
    {
        $end = count($data) - 1;
        $newArr = $this->halfFind($data, 0, $end, $k);

        $n = 0;
        foreach($newArr as $v){
            if($v == $k){
                $n++;
            }
        }

        return $n;
    }

    private function halfFind(array $data, int $start, int $end, int $k): array
    {
        if($start == $end){
            return [$data[$start]];
        }

        $mid = intval(($start + $end) / 2);
        $midVal = $data[$mid];
        if($k == $midVal){
            return array_slice($data, $start, $end - $start + 1);
        }

        if($k > $midVal){
            $res = $this->halfFind($data, $mid + 1, $end, $k);
        }else{
           $res =  $this->halfFind($data, $start, $mid, $k);
        }

        return $res;
    }

    public function run2(array $data, int $k): int
    {
        $count = count($data);
        if(empty($count)){
            return 0;
        }
        $start = 0;
        $end = $count - 1;
        $n = $this->countK($data, $start, $end, $k);
        return $n;
    }

    private function countK(array $data, int $start, $end, $k): int
    {
        $mid = intval(($start + $end) / 2);
        $midVal = $data[$mid];

        if($start == $end && $midVal != $k){
            return 0;
        }

        if($midVal == $k){
            $firstKIndex = $this->getFirstK($data, $start, $mid, $k);
            $lastKIndex = $this->getLastK($data, $mid + 1, $end, $k);

            $n = $lastKIndex - $firstKIndex + 1;
            return $n;

        }elseif($k > $midVal){
            $n = $this->countK($data, $mid + 1, $end, $k);
        }else{
            $n = $this->countK($data, $start, $mid, $k);
        }

        return $n;
    }

    private function getFirstK(array $data, int $start, int $end, int $k): int
    {
        $mid = intval(($start + $end) / 2);
        $midVal = $data[$mid];

//        if($start == $end && $midVal != $k){
//            return -1;
//        }

        if($midVal == $k){
            if($mid == 0 || $data[$mid-1] != $k){
                return $mid;
            }else{
                $end = $mid;
            }
        }elseif($k > $midVal){
            $start = $mid + 1;
        }else{
            $end = $mid;
        }

        return $this->getFirstK($data, $start, $end, $k);
    }

    private function getLastK(array $data, int $start, int $end, int $k): int
    {
        $mid = intval(($start + $end) / 2);
        $midVal = $data[$mid];
//        if($start == $end && $k != $midVal){
//            return -1;
//        }

        if($k == $midVal){
            if($mid == $end || $data[$mid+1] != $midVal){
                return $mid;
            }else{
                $start = $mid;
            }
        }elseif($k > $midVal){
            $start = $mid + 1;
        }else{
            $end = $mid;
        }

        return $this->getLastK($data, $start, $end, $k);
    }


}


$arr = [1,2,3,4,5,6,9];
$class = new GetNumberOfK();
$n = $class->run1($arr, 3);
var_dump($n);

$arr = [1];
$class = new GetNumberOfK();
$n = $class->run1($arr, 1);
var_dump($n);

$arr = [];
$class = new GetNumberOfK();
$n = $class->run2($arr, 1);
var_dump($n);

$arr = [1];
$class = new GetNumberOfK();
$n = $class->run2($arr, 1);
var_dump($n);

$arr = [1,2,2,3];
$class = new GetNumberOfK();
$n = $class->run2($arr, 2);
var_dump($n);

$arr = [1];
$class = new GetNumberOfK();
$n = $class->run2($arr, -1);
var_dump($n);