<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 写一个函数，求两个整数之和，要求在函数体内不得使用+、-、*、/四则运算符号。
 * Class Add
 * @package App\Offer
 */
class Add
{
    /**
     *
     * @param int $num1
     * @param int $num2
     * @return int
     */
    public function run1(int $num1, int $num2): int
    {
        do{
            $sum = $num1 ^ $num2;
            $carry = ($num1 & $num2 ) << 1;
            $num1 = $sum;
            $num2 = $carry;
        }while($num2 != 0);

        return $num1;
    }
}


// test
$class = new Add();
$num1 = 17;
$num2 = 5;
$res = $class->run1($num1, $num2);
var_dump($res);

$num1 = 37;
$num2 = 64;
$res = $class->run1($num1, $num2);
var_dump($res);