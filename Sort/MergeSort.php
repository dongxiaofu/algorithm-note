<?php
/**
 * 归并排序
 * 数组经过处理后，前部分是有序，后部分是无序。将无序部分复制到另外的数组B（B的数组元素个数为N）。
 * 对数组B进行归并处理，将B分为两部分C、D，进行N次循环，每次循环，分别从C、D中取出一个元素，进行比较，小元素放入有序部分
 */

namespace App\Sort;

require_once dirname(__DIR__) . '/Autoload.php';

class MergeSort extends BaseSort
{
    public function usort($arr)
    {
        $start = 0;
        $end = count($arr)-1;
        $arr = $this->sort($arr, $start, $end);
        return $arr;
    }

    private function sort($arr, $start, $end)
    {
        if($start >= $end){
            return $arr;
        }

        $mid = floor(($start + $end) / 2);
        $arr = $this->sort($arr, $start, $mid);
        $arr = $this->sort($arr, $mid + 1, $end);
        $arr = $this->merge($arr, $start, $mid, $end);

        return $arr;
    }

    private function merge($arr, $start, $mid, $end)
    {
       $i = $start;
       $j = $mid + 1;
       $aux = $this->copyArray($arr, $start, $end);

       for($k = $i; $k <= $end; $k++){
           if($i > $mid){
               $arr[$k] = $aux[$j++];
           }elseif($j > $end){
               $arr[$k] = $aux[$i++];
           }elseif($this->less($aux[$j], $aux[$i])){
               $arr[$k] = $aux[$j++];
           }else{
               $arr[$k] = $aux[$i++];
           }
       }

       return $arr;
    }
}


MergeSort::main();