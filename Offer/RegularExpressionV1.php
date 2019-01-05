<?php
declare(strict_types=1);

namespace App\Offer;

// 理解了网上的解答思路，但下面代码仍然不能通过所有的测试用例。
// case太多，调试起来也麻烦
// 耗费时间1天
// 对照测试用例，终于修补得没有问题了
class RegularExpressionV1
{
    public function match($s, $pattern)
    {

        if (is_null($s) || is_null($pattern) || $s === false || $pattern === false) {
            return false;
        }

        if ($s == '' && $pattern == '') {
            return true;
        }

        if ($s != '' && $pattern == '') {
            return false;
        }

        $sLength = strlen($s);
        $patternLength = strlen($pattern);

        $i = 0;
        $j = 0;
        if ($sLength) {
            if (($s[0] != $pattern[0]) && $pattern[0] != '.' && ($patternLength < 2 || ($patternLength >= 2 && $pattern[1] != '*'))) {
                return false;
            }
        }

        if ($j + 1 >= $patternLength || $pattern[$j + 1] != '*') {
            if ($patternLength > 0 && (($sLength != 0 && $s[$i] == $pattern[$j]) || ($sLength != 0 && $s[0] != '' && $pattern[$j] == '.'))) {
                $s = substr($s, $i + 1);
                $pattern = substr($pattern, $j + 1);
                return $this->match($s, $pattern);
            } else {
                return false;
            }
        } else {
            if ((($sLength >= 1 && $s[$i] == $pattern[$j]) || $pattern[$j] == '.') && $i == $sLength - 1 && $j == $patternLength - 1) {
                return true;
            }
            if ($i < $sLength && ($s[$i] == $pattern[$j] || $pattern[$j] == '.')) {

                return ($this->match($s, substr($pattern, 2)) || $this->match(substr($s, 1), $pattern));

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

$class = new RegularExpressionV1();
$str = "";
$pattern = ".*";
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpressionV1();
$str = "a";
$pattern = "a.";
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpressionV1();
$str = "aa";
$pattern = ".";
$bool = $class->match($str, $pattern);
var_dump($bool);


