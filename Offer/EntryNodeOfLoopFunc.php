<?php
declare(strict_types=1);

include_once '../Autoload.php';

use App\Offer\MyListNode;

function EntryNodeOfLoop($pHead)
{
    // write code here
    if (is_null($pHead) || is_null($pHead->next) || is_null($pHead->next->next)) {
        return null;
    }

    $fast = $pHead->next->next;
    $slow = $pHead->next;
    while ($fast != $slow) {
        $slow = $slow->next;
        if (is_null($slow)) {
            return null;
        }
        $fast = $fast->next->next;
        if (is_null($fast)) {
            return null;
        }
    }

    $fast = $pHead;
    while ($fast != $slow) {
        $fast = $fast->next;
        $slow = $slow->next;
        if (is_null($slow)) {
            return null;
        }
    }

    return $fast;
}

$node1 = new MyListNode(1);
$node2 = new MyListNode(2);
$node1->next = $node2;
$node3 = new MyListNode(3);
$node2->next = $node3;
$node3->next = $node1;
$target = EntryNodeOfLoop($node1);
var_dump($target);


$node1 = null;
$target = EntryNodeOfLoop($node1);
var_dump($target);

