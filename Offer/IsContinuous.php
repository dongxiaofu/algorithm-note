<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * LL今天心情特别好,因为他去买了一副扑克牌,发现里面居然有2个大王,2个小王(一副牌原本是54张^_^)...他随机从中抽出了5张牌,想测测自己的手气,看看
 * 能不能抽到顺子,如果抽到的话,他决定去买体育彩票,嘿嘿！！“红心A,黑桃3,小王,大王,方片5”,“Oh My God!”不是顺子.....LL不高兴了,他想了想,决
 * 定大\小 王可以看成任何数字,并且A看作1,J为11,Q为12,K为13。上面的5张牌就可以变成“1,2,3,4,5”(大小王分别看作2和4),“So Lucky!”。LL决定
 * 去买体育彩票啦。 现在,要求你使用这幅牌模拟上面的过程,然后告诉我们LL的运气如何， 如果牌能组成顺子就输出true，否则就输出false。为了方便起
 * 见,你可以认为大小王是0。
 * Class IsContinuous
 * @package App\Offer
 */
class IsContinuous
{
    public function run1(array $numbers): bool
    {
        $count = count($numbers);
        if(empty($count)){
            return false;
        }

        $sortedNumbers = $this->quickSort($numbers);
        $numberOfZero = 0;
        $numberInterval = 0;

        for($i = 0; $i < $count; $i++){
            if($sortedNumbers[$i] == 0){
                $numberOfZero++;
                continue;
            }

            if($i + 1 >= $count){
                continue;
            }

            if($sortedNumbers[$i] == $sortedNumbers[$i+1]){
                return false;
            }

            $numberInterval += $sortedNumbers[$i+1] - $sortedNumbers[$i] - 1;
        }

        if($numberInterval <= $numberOfZero){
            return true;
        }

        return false;
    }

    private function quickSort(array $numbers): array
    {
        if(empty($numbers)){
            return [];
        }

        if(count($numbers) == 1){
            return $numbers;
        }

        $count = count($numbers);
        $flag = $numbers[0];
        $left = [];
        $right = [];
        for($i = 1; $i < $count; $i++){
            if($numbers[$i] < $flag){
                $left[] = $numbers[$i];
            }else{
                $right[] = $numbers[$i];
            }
        }

        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        return array_merge($left, [$flag], $right);
    }

    private function countNumber(array $numbers): array
    {
        $data = [];

        foreach($numbers as $v){
            if(isset($data[$v])){
                $data[$v] += 1;
            }else{
                $data[$v] = 1;
            }
        }

        return $data;
    }
}

$class = new IsContinuous();
$numbers = [2,3,4,5,6];
$res = $class->run1($numbers);
var_dump($res);

$numbers = [2,5,4,5,6];
$res = $class->run1($numbers);
var_dump($res);

$numbers = [1,3,2,6,4];
$res = $class->run1($numbers);
var_dump($res);

$numbers = [3,0,0,0,0];
$res = $class->run1($numbers);
var_dump($res);

