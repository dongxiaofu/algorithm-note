<?php

namespace App\Sort;

require_once dirname(__DIR__) . '/Autoload.php';

class SelectionSort extends BaseSort
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
        $newArr = [];

        for($i = $start; $i <= $end; $i++){
            $mix = $arr[$i];
            for($j = $i + 1; $j <= $end; $j++){
               if($this->less($arr[$j], $mix)){
                   $mix = $arr[$j];
                   $this->exch($arr, $i, $j);

               }
            }
            $newArr[] = $mix;
        }

        return $newArr;
    }
}

SelectionSort::main();