<?php
declare(strict_types=1);

namespace App\Offer;


/**
 * 输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。如果是则输出Yes,否则输出No。
 * 假设输入的数组的任意两个数字都互不相同。
 *
 * 1>遍历的同时进行比较，判定条件：二叉树遍历完毕时整数数组也遍历完毕，那么YES
 * 2>保存二叉树遍历的结果到数组中，对比两个数组，占用的内存大
 * 3>选第一种
 *
 * 理解错了题意，题意是，给一个数组，判断它是不是某个二叉搜索树的后序遍历结果；并非是给定数组和二叉搜索树再做判断
 */

require_once dirname(__DIR__) . '/Autoload.php';

class VerifySquenceOfBST
{
    public function run1(array $sequence): string
    {
        $bool = $this->check($sequence);

        return $bool ? 'YES': 'NO';
    }

    private function check(array $sequence): bool
    {
        if(empty($sequence)){
            return false;
        }
        $len = count($sequence);

        $rootVal = $sequence[$len - 1];

        for($i = 0; $i < $len-1; $i++){
            if($sequence[$i] > $rootVal){
                break;
            }
        }

        for($j = $i; $j < $len-1; $j++){
            if($sequence[$j] < $rootVal){
                return false;
            }
        }

        $left = true;
        if($i > 0){
            $leftChild = array_slice($sequence,0, $i);
            $left = $this->check($leftChild);
        }

        $right = true;
        if($j < $len-1){
            $rightChild = array_slice($sequence, $j, $len-1-$j);
            $right = $this->check($rightChild);
        }

        return $left && $right;
    }
}

// test
$v = new VerifySquenceOfBST();
$sequence = [7,6,9,11,120,34,50];
//$sequence = [2,9,53,7,3,6];
$sequence = [7,4,6,5];
$res = $v->run1($sequence);
var_dump($res);
