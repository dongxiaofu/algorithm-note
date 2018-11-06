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
}