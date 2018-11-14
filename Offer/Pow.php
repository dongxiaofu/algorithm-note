<?php
declare(strict_types=1);

namespace App\Offer;

require_once dirname(__DIR__) . '/Autoload.php';

class Pow
{
    private $invalidInput = true;

    public function run1(float $i, int $j): float
    {
        if($this->equal($i, 0.0) && $j < 0){
            $this->invalidInput = true;
            return 0.0;
        }

        $absJ = $j;
        if($j < 0){
            $absJ = -$j;
        }

        $res = 1.0;
        for($k = 1; $k <= $absJ; $k++){
            $res = $res * $i;
        }

        if($j < 0){
            $res = 1.0 / $res;
        }

        return $res;
    }


    private function equal(float $a, float $b): bool
    {
        $diff = 0.00001;
        if($a - $b > $diff && $a - $b < -$diff){
            return true;
        }else{
            return false;
        }
    }

    public function run2(float $base, int $exponent): float
    {
        // write code here
        if($exponent == 0){
            return 1.0;
        }

        if($exponent == 1){
            return $base;
        }

        /**
         * -1 >> 1 结果是-1，进入了死循环
         * 在java中测试，这里也进入了死循环
         */
        $exponentAbs = $exponent;
        if($exponent < 0){
            $exponentAbs = - $exponentAbs;
        }
        $exponentAbs = $exponentAbs >> 1;
        $res = $this->run2($base, $exponentAbs);
        $res = $res * $res;
        if($exponent & 1 == 1){
            $res = $res * $base;
        }

        if($exponent < 0){
            $res = 1.0 / $res;
        }

        return $res;
    }
}

$a = -3;
var_dump($a >> 1);
var_dump(pow(2, -1));
//exit;

$p = new Pow();
//$res1 = $p->run1(2, 0);
//var_dump($res1);
//$res1 = $p->run1(2, 1);
//var_dump($res1);
//$res1 = $p->run1(2, 3);
//var_dump($res1);
//$res1 = $p->run1(2, -3);
//var_dump($res1);
//
//echo '<hr>';
//$res1 = $p->run2(2, 0);
//var_dump($res1);
//$res1 = $p->run2(2, 1);
//var_dump($res1);
//$res1 = $p->run2(2, 3);
//var_dump($res1);
$res1 = $p->run2(2, -4);
var_dump($res1);