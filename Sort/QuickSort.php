<?php
/**
 * Created by PhpStorm.
 * User: cg
 * Date: 2018/11/6
 * Time: 8:23 PM
 */

namespace App\Sort;

require_once dirname(__DIR__) . '/Autoload.php';

class QuickSort extends BaseSort
{
    public function usort($arr)
    {
        $start = 0;
        $end = count($arr) - 1;
        $arr = $this->sort($arr, $start, $end);

        return $arr;
    }

    private function sort($arr, $start, $end)
    {
        if($start >= $end){
            return $arr;
        }

        $j = $this->partition($arr, $start, $end);
        $arr = $this->sort($arr, $start, $j-1);
        $arr = $this->sort($arr, $j+1, $end);

        return $arr;
    }

    private function partition(&$arr, $start, $end)
    {
        $i = $start;
        $j = $end + 1;
        $v = $arr[$start];

        while(true){

            while($this->less($arr[++$i], $v)){
                if($i == $end){
                    break;
                }
            }

            while($this->less($v, $arr[--$j])){
                if($j == $start){
                    break;
                }
            }

            if($i >= $j){
                break;
            }

            $this->exch($arr, $i, $j);
        }

        /**
         * 突然理解不了，这里为何是 交换 $start 和 $j，而不是交换 $start 和 $i 。
         * while(true){}终止的条件是 $i >= $j，$arr[$i] >= $v, $arr[$j] <= $v
         * 1> $i > $j
         * * A> 终止条件的前一步是, $i-1 和 $j+1，二者已经遍历完毕数组。
         * * B> 从$start到$i-1位置的元素，都小于$start位置的元素；从$j+1到$end位置的元素，都大于$start的元素。
         * * C> 终止时，$arr[$i] >= $v, $arr[$j] <= $v
         * * * a> 若将v与$arr[$i]互换，那么，$start到$i-1位置的元素都小于$arr[$i](==$v)，但$arr[$start]大于$arr[$i](==$v)
         * * * a> $i+1到$end位置的元素，都大于$arr[$i](==$v)
         * * * a> i之前的元素，不全小于 $arr[$i](==$v)，没有达到"将数组调整为基本有序"的效果。
         * * * b> 若将v与$arr[$j]互换，那么，从$j+1到$end的元素，都大于$arr[$j](==$v)，$arr[$start](==$arr[$j]) <= $v，数组变为
         * * * b> 基本有序：$j之前的都小于$arr[$j](==$v)，$j之后的都大于$arr[$j](==$v)
         * 2> $i == $j，用i或j与start交换效果相同
         */
        $this->exch($arr, $start, $j);
        return $j;
    }
}


QuickSort::main();