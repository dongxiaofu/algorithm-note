<?php
declare(strict_types=1);

namespace App\Offer;

use App\Stack\Stack;

/**
 * 输入两个整数序列，第一个序列表示栈的压入顺序，请判断第二个序列是否可能为该栈的弹出顺序。
 * 假设压入栈的所有数字均不相等。例如序列1,2,3,4,5是某栈的压入顺序，序列4,5,3,2,1是该压
 * 栈序列对应的一个弹出序列，但4,3,5,1,2就不可能是该压栈序列的弹出序列。（注意：这两个序列
 * 的长度是相等的）
 * Class IsPopOrder
 * @package App\Offer
 */

require_once dirname(__DIR__) . '/Autoload.php';

class IsPopOrder
{
    public function run1(Stack $pushStack, Stack $popStack): bool
    {
        $isPossible = false;
        $stackData = new Stack();


        while (!$popStack->isEmpty()) {
            while ($stackData->isEmpty() || $popStack->top() != $stackData->top()) {
                if ($pushStack->isEmpty()) {
                    break;
                }

                $pushTop = $pushStack->pop();
                $stackData->push($pushTop);
            }

            if ($popStack->pop() != $stackData->pop()) {
                break;
            }

            $stackData->pop();
            $popStack->pop();
        }

        if ($stackData->isEmpty() && $popStack->isEmpty()) {
            $isPossible = true;
        }

        return $isPossible;
    }

    public function run2(array $pushV, array $popV): bool
    {
        $stack = new \SplStack();
        $len = count($pushV);
        $j = 0;
        for ($i = 0; $i < $len; $i++) {
            $stack->push($pushV[$i]);

            /**
             * 神奇的错误
             * Fatal error: Uncaught RuntimeException: Can't peek at an empty datastructure
             * 过了一段时间，再次执行这段，也没有问题，奇怪
             *
             * while($j < $len && $stack && ($stack->top() == $popV[$j])){
             * $stack->pop();
             * $j++;
             * }
             * * * */


            /**
             * 这样写就没有错误
             */
            while ($j < $len && $stack->top() == $popV[$j]) {
                $stack->pop();
                $j++;
            }

        }
        if ($stack->isEmpty()) {
            return true;
        }

        return false;
    }

    function run3($pushV, $popV)
    {
        // write code here
        $stack = new \SplStack();
        $len = count($pushV);
        $j = 0;
        for ($i = 0; $i < $len; $i++) {
            $stack->push($pushV[$i]);
            while ($j < $len && $popV[$j] == $stack->top()) {
                $stack->pop();
                $j++;
            }
        }
        if ($stack->isEmpty()) {
            return true;
        }
        return false;
    }

    function run4(array $pushV, array $popV): bool
    {
        $isPossbile = false;
        $stack = new \SplStack();
        $len = count($pushV);
        $i = $j = 0;
        while($j < $len){

            while($stack->isEmpty() || ($i < $len && $popV[$j] != $stack->top())){
                $stack->push($pushV[$i++]);
            }

            if($popV[$j] != $stack->top()){
                break;
            }

            $stack->pop();
            $j++;
        }

        if($i == $j){
            $isPossbile = true;
        }

        return $isPossbile;
    }
}

// test
$pushStack = new Stack();
$pushStack->push('1');
$pushStack->push('2');
$pushStack->push('3');
$pushStack->push('4');
$pushStack->push('5');

$popStack = new Stack();
$popStack->push('1');
$popStack->push('2');
$popStack->push('3');
$popStack->push('5');
$popStack->push('4');

$ip = new IsPopOrder();
$isPossible = $ip->run1($pushStack, $popStack);
var_dump($isPossible);

echo '<hr>';

$pushV = [1, 2, 3, 4, 5];
$popV = [4, 5, 3, 2, 1];
$isPossible = $ip->run2($pushV, $popV);
var_dump($isPossible);

echo '<hr>';

$pushV = [1, 2, 3, 4, 5];
$popV = [4, 5, 3, 2, 1];
$isPossible = $ip->run3($pushV, $popV);
var_dump($isPossible);

$pushV = [1, 2, 3, 4, 5];
$popV = [4, 5, 3, 2, 1];
$isPossible = $ip->run4($pushV, $popV);
var_dump($isPossible);