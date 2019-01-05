<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 未能通过所有测试用例，放弃此种解法
 * 请实现一个函数用来匹配包括'.'和'*'的正则表达式。模式中的字符'.'表示任意一个字符，而'*'表示它前面的字符可以出现任意次（包含0次）。 在本题
 * 中，匹配是指字符串的所有字符匹配整个模式。例如，字符串"aaa"与模式"a.a"和"ab*ac*a"匹配，但是与"aa.a"和"ab*a"均不匹配
 * Class RegularExpression
 * @package App\Offer
 */
class RegularExpression
{
    public function match(?string $str, ?string $pattern): bool
    {
        if (is_null($str) || is_null($pattern)) {
            return false;
        }

        $strLength = strlen($str);
        $patternLength = strlen($pattern);

        $i = 0;
        $j = 0;
        $all = false;
        while ($i < $strLength && $j < $patternLength) {
            if ($str[$i] == $pattern[$j]) {
                $i++;
                $j++;
                continue;
            }

            if ($str[$i] == $pattern[$j] && $j + 1 < $patternLength && $pattern[$j + 1] == '*') {
                while ($i + 1 < $strLength && $str[$i] == $str[$i + 1]) {
                    $i++;
                }
                $j++;
                continue;
            }

            if ($j + 1 < $patternLength && $pattern[$j] == '.' && $pattern[$j + 1] == '*') {
                $all = true;
                $i++;
                continue;
            }

            if ($pattern[$j] == '.') {
                $i++;
                $j++;
                continue;
            }

            if ($j + 1 < $patternLength && $pattern[$j + 1] == '*') {
//                $i++;
                $j = $j + 2;
                continue;
            }
        }

        if ($all) {
            $j = $j + 2;
        }

        // // 这种用例，用现有思路很复杂，无规律可循
        if ($all && $patternLength > $j) {
            $diff = $patternLength - $j;
            $jj = $patternLength - 1;
            $ii = $strLength - 1;
            while ($ii && $jj && $diff >= 0) {
                if ($pattern[$jj--] == $str[$ii--]) {
                    $diff--;
                } else {
                    return false;
                }
            }

            return true;
        }

        if ($i != $strLength || $j != $patternLength) {
            return false;
        }

        return true;
    }
}

// 这种用例，用现有思路很复杂，无规律可循
$class = new RegularExpression();
$str = 'aaa';
$pattern = '.*a';
$bool = $class->match($str, $pattern);
var_dump($bool);
exit;


$class = new RegularExpression();
$str = 'aaa';
$pattern = 'aa.a';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpression();
$str = 'aaa';
$pattern = 'a.a';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpression();
$str = 'aaa';
$pattern = 'ab*ac*a';
$bool = $class->match($str, $pattern);
var_dump($bool);

$class = new RegularExpression();
$str = 'aaa';
$pattern = 'ab*a';
$bool = $class->match($str, $pattern);
var_dump($bool);

