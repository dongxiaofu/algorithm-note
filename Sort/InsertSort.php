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

    public function run2(array $arr): array
    {
        $count = count($arr);
        for($i = 1; $i < $count; $i++){
            $tmp = $arr[$i];
            for($j = $i - 1; $j >= 0; $j--){
                if($this->less($tmp, $arr[$j])){
                    $arr[$j+1] = $arr[$j];
                }else{

//                    $arr[$j+1] = $tmp;
                    break;
                }
            }
            $arr[$j+1] = $tmp;
        }

        return $arr;
    }
}

InsertSort::main();

echo '<hr>';

$class = new InsertSort();
$arr = [7,2,9,4];
$res = $class->run2($arr);
var_dump($res);