<?php
declare(strict_types=1);

namespace App\Offer;


/**
 *
 * 牛客最近来了一个新员工Fish，每天早晨总是会拿着一本英文杂志，写些句子在本子上。同事Cat对Fish写的内容颇感兴趣，有一天他向Fish借来翻看，但却
 * 读不懂它的意思。例如，“student. a am I”。后来才意识到，这家伙原来把句子单词的顺序翻转了，正确的句子应该是“I am a student.”。Cat对一
 * 一的翻转这些单词顺序可不在行，你能帮助他么？
 * Class ReverseSentence
 * @package App\Offer
 */
class ReverseSentence
{
    public function run1(string $str): string
    {
        $length = strlen($str);
        $newStr = '';
        for($i = $length - 1; $i >= 0; $i--){
            $newStr .= $str[$i];
        }

        return $newStr;
    }
}

// test
$class = new ReverseSentence();
$str = "student. a am I";
$res = $class->run1($str);
var_dump($res);