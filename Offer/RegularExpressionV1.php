<?php
declare(strict_types=1);

namespace App\Offer;

// 理解了网上的解答思路，但下面代码仍然不能通过所有的测试用例。
// case太多，调试起来也麻烦
// 耗费时间1天
class RegularExpressionV1
{
    public function match($s, $pattern)
    {

        if (is_null($s) || is_null($pattern) || $s === false || $pattern === false) {
            return false;
        }

        if($s === $pattern){
            return true;
        }

        $sLength = strlen($s);
        $patternLength = strlen($pattern);
        if($sLength * $patternLength == 0){
            return false;
        }

        $i = 0;
        $j = 0;
        if ($s[0] != $pattern[0] && $pattern[0] != '.' && ($patternLength < 2 || $pattern[1] != '*')) {
            return false;
        }
        if ($i + 1 < $sLength && $j + 1 < $patternLength && $pattern[$j + 1] != '*') {
            if ($s[$i] == $pattern[$j] || $pattern[$j] == '.') {
                $s = substr($s, $i + 1);
                $pattern = substr($pattern, $j + 1);
                return $this->match($s, $pattern);
            } else {
                return false;
            }
        } else {
            if (($s[$i] == $pattern[$j] || $pattern[$j] == '.') && $i == $sLength - 1 && $j == $patternLength - 1) {
                return true;
            }
            if ($i < $sLength && ($s[$i] == $pattern[$j] || $pattern[$j] == '.')) {
                $s2 = $s3 = substr($s, $i + 1);

                $b = $this->match($s3, $pattern);

                $pattern2 = substr($pattern, $j + 2);
                $c = $this->match($s2, $pattern2);

                if ($b || $c) {
                    return true;
                } else {

//                    $pattern1 = substr($pattern, $j + 2);
//                    return $this->match($s, $pattern1);

                    return false;
                }
            } else {
                $pattern1 = substr($pattern, $j + 2);
                return $this->match($s, $pattern1);
            }
        }
    }
}


$class = new RegularExpressionV1();
$str = 'aaa';
$pattern = 'b*a.*a';
$bool = $class->match($str, $pattern);
var_dump($bool);
//
//
$class = new RegularExpressionV1();
$str = 'aaa';
$pattern = 'aaa';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpressionV1();
$str = 'aaa';
$pattern = 'a.a';
$bool = $class->match($str, $pattern);
var_dump($bool);
//
$class = new RegularExpressionV1();
$str = 'aaa';
$pattern = 'ab*ac*a';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpressionV1();
$str = 'aaa';
$pattern = 'ab*.a';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpressionV1();
$str = "";
$pattern = "";
$bool = $class->match($str, $pattern);
var_dump($bool);


