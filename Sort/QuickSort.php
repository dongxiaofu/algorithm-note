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
        $arr = $this->sort($arr, $start, $j - 1);
        $arr = $this->sort($arr, $j + 1, $end);

        return $arr;
    }

    private function partition(&$arr, $start, $end)
    {
        $i = $start;
        $j = $end + 1;
        $v = $arr[$start];

        while (true) {

            while ($this->less($arr[++$i], $v)) {
                if ($i == $end) {
                    break;
                }
            }

            while ($this->less($v, $arr[--$j])) {
                if ($j == $start) {
                    break;
                }
            }

            if ($i >= $j) {
                break;
            }

            $this->exch($arr, $i, $j);
        }

        $this->exch($arr, $start, $j);

        return $j;
    }
}


QuickSort::main();