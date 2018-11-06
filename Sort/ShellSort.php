<?php
/**
 * 希尔排序
 * 1.按一组连续的步长N1，N2，N3，对N1 和 N1-N1 比较大小，并交换位置
 * 2.一个步长排序完毕后，就按下一个步长排序，最后分解为按步长1排序。
 * 3.按步长1排序数组，可以实现排序，之前的步长排序的作用是使数组变得有序一些，使最后按步长1排序效率高。
 */

namespace App\Sort;

require_once dirname(__DIR__) . '/Autoload.php';

class ShellSort extends BaseSort
{
    private const BASE_STEP = 2;

    public function usort($arr)
    {
        $end = count($arr) - 1;
        $arr = $this->sort($arr, $end);
        return $arr;
    }

    private function getStep($count)
    {
        $h = 1;
        while($h < floor($count / self::BASE_STEP)){
           $h *= self::BASE_STEP;
        }

        return $h;
    }

    private function sort($arr, $end)
    {
        $count = count($arr);
        $h = $this->getStep($count);

        while($h >= 1){
            for($i = $h; $i <= $end; $i++){
                for($j = $i; $j >= $h && $this->less($arr[$j], $arr[$j-$h]); $j -= $h){
                   $this->exch($arr, $j, $j-$h);
                }
            }

            $h /= self::BASE_STEP;
        }

        return $arr;
    }
}

ShellSort::main();