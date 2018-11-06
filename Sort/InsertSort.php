<?php

namespace App\Sort;

require_once dirname(__DIR__) . '/Autoload.php';

class InsertSort extends BaseSort
{
    public function usort($arr)
    {
        $arr = $this->sort($arr);

        return $arr;
    }

    public function sort($arr)
    {
        for($i = 1; $i < count($arr); $i++){
            for($j = $i; $j > 0 && $this->less($arr[$j], $arr[$j-1]); $j--){
                $this->exch($arr, $j, $j-1);
            }
        }

        return $arr;
    }
}

InsertSort::main();