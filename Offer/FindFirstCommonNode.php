<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * Class ListNode
 * @package App\Offer
 * 输入两个链表，找出它们的第一个公共结点。
 *
 * 1.很容易想到遍历的解法
 * * A>很简单的代码，却不能 bug free，写出了死循环。
 * 2.
 */

class ListNode
{
    private $val;
    private $next = null;

    public function __construct(int $val)
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
                if($cur1->getVal() == $cur2->getVal()){
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
}



// test
$class = new FindFirstCommonNode();
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node1->setNext($node2);
$node3 = new ListNode(3);
$node2->setNext($node3);

$node21 = new ListNode(3);
$node22 = new ListNode(9);
$node21->setNext($node22);

$commonNode = $class->run1($node1, $node21);
var_dump($commonNode);