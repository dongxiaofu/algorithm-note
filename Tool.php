<?php
/**
 * Created by PhpStorm.
 * User: cg
 * Date: 2018/11/6
 * Time: 8:19 PM
 */

namespace App;

trait Tool
{
    protected function exch(&$arr, $i, $j)
    {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }

    protected function less($a, $b)
    {
        return $a < $b;
    }

    public function prettyPrint($arr)
    {
        foreach($arr as $v){
            echo $v . ' ';
        }

        echo '<hr>';
    }

    private static function mock($n, $max = 20)
    {
        $arr = [];

        for($i = 0; $i < $n; $i++){
            $arr[] = mt_rand(0, $max);
        }

        return $arr;
    }

    protected function copyArray($arr, $start, $end)
    {
        $newArr = [];
        for($i = $start; $i <= $end; $i++){
            $newArr[$i] = $arr[$i];
        }

        return $newArr;
    }

    /**
     * 二叉Heap中的下沉方法
     * @param $array
     * @param $k
     * @param $n
     */
    protected function sinkInHeap(&$array, $k, $n): void
    {
        while($k * 2 <= $n){

            $j = $k * 2;
            /**
             * 边界条件弄错了，没有判断超出数组边界
             */
            if($j <= $n & $j+1 <= $n && $this->less($array[$j], $array[$j+1])){
                $j++;
            }

            /**
             * 否定判断，绕口，我很容易出错，理解起来也费尽
             */
            if(!$this->less($array[$k], $array[$j])){
                break;
            }

//            if($this->less($array[$j], $array[$k])){
//                break;
//            }

            $this->exch($array, $k, $j);

            $k = $j;
        }
    }
}