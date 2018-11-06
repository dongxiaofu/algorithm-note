<?php
/**
 * Created by PhpStorm.
 * User: cg
 * Date: 2018/11/6
 * Time: 8:41 PM
 */

namespace App\Sort;


use App\Tool;

class BaseSort
{
    use Tool;

    public static function main()
    {
        $arr = self::mock(6);

//        $arr = [2,0,9,-1];

        $sort = new Static();
        $newArr = $sort->usort($arr);
        $sort->prettyPrint($arr);
        $sort->prettyPrint($newArr);
    }
}