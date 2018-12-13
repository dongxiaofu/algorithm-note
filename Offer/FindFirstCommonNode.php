<?php
declare(strict_types=1);

namespace App\Offer;

use App\Stack\Stack;

/**
 * Class ListNode
 * @package App\Offer
 * 输入两个链表，找出它们的第一个公共结点。
 *
 * 1.很容易想到遍历的解法
 * * A>很简单的代码，却不能 bug free，写出了死循环。
 * 2.使用辅助栈，修复 对空栈使用pop 错误，花了很多时间
 */

class ListNode
{
    private $val;
    private $next = null;

    public function __construct(?int $val)
    {
        $this->val = $val;
    }

    public function setNext(ListNode $listNode): void
    {
        $this->next = $listNode;
    }

    public function getNext(): ?ListNode
    {
        return $this->next;
    }

    public function getVal(): ?int
    {
        return $this->val;
    }
}


class FindFirstCommonNode
{
    public function run1(ListNode $pHead1, ListNode $pHead2): ?ListNode
    {
        /** @var ListNode $cur1 */
        $cur1 = $pHead1;
        if(is_null($cur1)){
            return null;
        }
        while($cur1->getVal()){
            /** @var ListNode $cur2 */
            $cur2 = $pHead2;
            if(is_null($cur2)){
                return null;
            }
            while($cur2->getVal()){
                if($this->equal($cur1, $cur2)){
                    return $cur1;
                }
                $cur2 = $cur2->getNext();
                if(is_null($cur2)){
                    break;
                }

            }
            $cur1 = $cur1->getNext();
            if(is_null($cur1)){
                return null;
            }
        }

        return null;
    }

    public function run2(ListNode $pHead1, ListNode $pHead2): ?ListNode
    {
        // 先把链表放入栈
        $stack1 = new \SplStack();
        $stack2 = new \SplStack();
        $cur1 = $pHead1;
        $cur2 = $pHead2;
        while($cur1 || $cur2){

            if($cur1){
                $stack1->push($cur1);
                $cur1 = $cur1->getNext();

            }

            if($cur2){
                $stack2->push($cur2);
                $cur2 = $cur2->getNext();
            }

        }

        $lastDifferentNode = null;
        // 出栈，遇到第一个不相等的结点A时停止遍历，A的下一个结点B就是第一个公共结点
        while((!$stack1->isEmpty() && $top1 = $stack1->pop()) && (!$stack2->isEmpty() && $top2 = $stack2->pop())){
            if(!$this->equal($top1, $top2)){
                $lastDifferentNode = $top1;
                break;
            }
        }

        if(is_null($lastDifferentNode)){
            if(!$stack1->isEmpty()){
                $lastDifferentNode = $top1;
            }

            if(!$stack2->isEmpty()){
                $lastDifferentNode = $top2;
            }
        }

        if(is_null($lastDifferentNode)){
            return null;
        }

        $firstCommonNode = $lastDifferentNode->getNext();

        return $firstCommonNode;
    }

    public function run3(ListNode $pHead1, ListNode $pHead2): ?ListNode
    {
        // 先计算出两个链表的结点个数
        $cur1 = $pHead1;
        $num1 = 0;
        while($cur1){
            $num1++;
            $cur1 = $cur1->getNext();
        }

        $cur2 = $pHead2;
        $num2 = 0;
        while($cur2){
            $num2++;
            $cur2 = $cur2->getNext();
        }

        // 结点数的链表先开始遍历，将多出的结点遍历完毕之后，两个结点一起遍历；
        // 遇到第一个公共结点，即为目标结点
        $next1 = $pHead1;
        $next2 = $pHead2;
        $diff = abs($num2 - $num1);
        if($num2 >= $num1){
            while($num2 > 0){
                if($this->equal($next1, $next2)){
                    return $next1;
                }
                $next2 = $next2->getNext();
                if($diff == 0){
                   $next1 = $next1->getNext();
                }
                $num2--;
                $diff && $diff--;
            }
        }else{
            while($num1 > 0){
                if($this->equal($next1, $next2)){
                    return $next1;
                }
                $next1 = $next1->getNext();
                if($diff == 0){
                    $next2 = $next2->getNext();
                }
                $num1--;
                $diff && $diff--;
            }
        }

        return null;
    }

//    private function findCommonNode(
//        ListNode $pHead1,
//        ListNode $pHead2,
//        int $num1,
//        int $num2
//    ): ?ListNode
//    {
//        $next1 = $pHead1;
//        $next2 = $pHead2;
//        $diff = abs($num2 - $num1);
//    }

    private function equal(ListNode $listNode1, ListNode $listNode2): bool
    {
        return ($listNode1->getVal() == $listNode2->getVal() && $listNode1->getNext() == $listNode2->getNext());
    }
}



// test
$class = new FindFirstCommonNode();
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node1->setNext($node2);
$node3 = new ListNode(3);
$node2->setNext($node3);
$node4 = new ListNode(7);
$node3->setNext($node4);

$node21 = new ListNode(3);
$node22 = new ListNode(7);
$node21->setNext($node22);

$commonNode = $class->run1($node1, $node21);
var_dump($commonNode);

$commonNode = $class->run2($node1, $node21);
var_dump($commonNode);

$commonNode = $class->run3($node1, $node21);
var_dump($commonNode);