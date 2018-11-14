<?php
declare(strict_types=1);

namespace App\Offer;


class ReOrderArray
{
    public function run1(array $array): array
    {
        $evenArr = [];
        $oddArr = [];

        foreach($array as $v){
            if(($v & 1) == 1){
                $oddArr[] = $v;
            }else{
                $evenArr[] = $v;
            }
        }

        $newArr = [];
        $countOdd = count($oddArr) - 1;
        for($i = 0; $i <= $countOdd; $i++){
            $newArr[] = $oddArr[$i];
        }

        foreach($evenArr as $vv){
            $newArr[] = $vv;
        }

        return $newArr;
    }
}

$r = new ReOrderArray();
$array = [1,2,3,4,5,6,7,8,9];
var_dump($array);
$newArr = $r->run1($array);
var_dump($newArr);