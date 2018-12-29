<?php
declare(strict_types=1);

namespace App\Offer;

class RandomListNode
{
    public $label;
    public $next = null;
    public $random = null;

    public function __construct($label)
    {
        $this->label = $label;
    }
}

/**
 * 输入一个复杂链表（每个节点中有节点值，以及两个指针，一个指向下一个节点，另一个特殊指针指向任意一个节点），返回结果为复制后复杂链表的head。
 * （注意，输出结果中请不要返回参数中的节点引用，否则判题程序会直接返回空）
 * Class CloneLinkList
 * @package App\Offer
 */
class CloneLinkList
{
    public function run1(?RandomListNode $pHead): ?RandomListNode
    {
        /**
         * 结合牛客网运行结果才补充上此边界条件
         */
        if (empty($pHead)) {
            return null;
        }
        $newPhead = new RandomListNode(null);
        $newPre = $newPhead;
        $cur = $pHead;
        do {
            $newCur = new RandomListNode(null);
            $newCur->label = $cur->label;
            $newCur->next = $cur->next;
            $newCur->random = $cur->random;

            $newPre->next = $newCur;

            $cur = $cur->next;
            $newPre = $newCur;
        } while ($cur);


        return $newPhead->next;
    }
}

$class = new CloneLinkList();
$node1 = new RandomListNode('');
$newPhead = $class->run1($node1);
var_dump($newPhead);