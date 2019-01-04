<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 给一个链表，若其中包含环，请找出该链表的环的入口结点，否则，输出null。
 * Class EntryNodeOfLoop
 * @package App\Offer
 */
class EntryNodeOfLoop
{
    public function findEntryNodeOfLoop(?MyListNode $pHead): ?MyListNode
    {
        if (is_null($pHead) || is_null($pHead->next) || is_null($pHead->next->next)) {
            return null;
        }

        $slow = $pHead->next;
        $fast = $pHead->next->next;
        while ($slow != $fast) {
            $slow = $slow->next;
            if(is_null($slow)){
                return null;
            }
            $fast = $fast->next->next;
            if(is_null($fast)){
                return null;
            }
        }

        $fast = $pHead;
        while ($fast != $slow) {
            $fast = $fast->next;
            $slow = $slow->next;
            if(is_null($slow)){
                return null;
            }
        }

        return $fast;
    }
}


$class = new EntryNodeOfLoop();
$node1 = new MyListNode(1);
$node2 = new MyListNode(2);
$node1->next = $node2;
$node3 = new MyListNode(3);
$node2->next = $node3;
$node3->next = $node1;
$target = $class->findEntryNodeOfLoop($node1);
var_dump($target);


$class = new EntryNodeOfLoop();
$node1 = null;
$target = $class->findEntryNodeOfLoop($node1);
var_dump($target);
