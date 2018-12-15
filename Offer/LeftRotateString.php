<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 汇编语言中有一种移位指令叫做循环左移（ROL），现在有个简单的任务，就是用字符串模拟这个指令的运算结果。对于一个给定的字符序列S，请你把其循环
 * 左移K位后的序列输出。例如，字符序列S=”abcXYZdef”,要求输出循环左移3位后的结果，即“XYZdefabc”。是不是很简单？OK，搞定它
 * Class LeftRotateString
 * @package App\Offer
 */

class LeftRotateString
{
    public function run1(string $str, int $n): string
    {
        $count = strlen($str);
        $str1 = '';
        $str2 = '';
        for($i = 0; $i < $count; $i++){
            if($i < $n){
                $str1 .= $str[$i];
            }else{
                $str2 .= $str[$i];
            }
        }

        return $str2 . $str1;
    }
}

// test
$class = new LeftRotateString();
$str = 'abcXYZdef';
$newStr = $class->run1($str, 3);
var_dump($newStr);