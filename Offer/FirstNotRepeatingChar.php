<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 在一个字符串(0<=字符串长度<=10000，全部由字母组成)中找到第一个只出现一次的字符,并返回它的位置, 如果没有则返回 -1（需要区分大小写）
 * Class FirstNotRepeatingChar
 * @package App\Offer
 */
class FirstNotRepeatingChar
{
    public function run1(string $str): int
    {
        $res = $this->countStr($str);
        $strNums = $res[0];
        $strKeys = $res[1];

        foreach($strNums as $k => $v){
            if($v == 1){
                $targetStr = $k;
                break;
            }
        }

        return ($strKeys[$targetStr] ?? -1);

    }

    private function countStr(string $str): array
    {
        $length = strlen($str);
        $res = [];
        $res1 = [];
        for($i = 0; $i < $length; $i++){
            $v = $str[$i];
            if(isset($res[$v])){
                $res[$v] += 1;
            }else{
                $res[$v] = 1;
                $res1[$v] = $i;
            }
        }

        return [$res, $res1];
    }
}

// test
$class = new FirstNotRepeatingChar();
$str = 'abcabdc';
$res = $class->run1($str);
var_dump($res);