<?php
declare(strict_types=1);

namespace App\Offer\Func;

class ListNode
{
    var $val;
    var $next = NULL;

    function __construct($x)
    {
        $this->val = $x;
    }
}

function FindFirstCommonNode($pHead1, $pHead2)
{
    // write code here
    $num1 = getLinkListNum($pHead1);
    $num2 = getLinkListNum($pHead2);

    $diff = abs($num1 - $num2);
    $next1 = $pHead1;
    $next2 = $pHead2;
    if ($num2 > $num1) {
        while ($num2 > 0) {
            if (equal($next1, $next2)) {
                return $next1;
            }
            $next2 = $next2->next;
            if ($diff == 0) {
                $next1 = $next1->next;
            }

            $num2--;
            $diff && $diff--;
        }
    } else {
        while ($num1 > 0) {
            if (equal($next1, $next2)) {
                return $next1;
            }
            $next1 = $next1->next;
            if ($diff == 0) {
                $next2 = $next2->next;
            }

            $num1--;
            $diff && $diff--;
        }
    }

    return null;
}

function equal($node1, $node2)
{
    return ($node1->val == $node2->val && $node1->next == $node2->next);
}

function getLinkListNum($pHead)
{
    $cur = $pHead;
    $num = 0;
    while ($cur) {
        $cur = $cur->next;
        $num++;
    }

    return $num;
}

$node11 = new ListNode(1);
$node12 = new ListNode(2);
$node11->next = $node12;
$node13 = new ListNode(3);
$node12->next = $node13;

$node21 = new ListNode(21);
$node22 = new ListNode(22);
$node21->next = $node22;
$node23 = new ListNode(3);
$node22->next = $node23;

$commonNode = FindFirstCommonNode($node11, $node21);
var_dump($commonNode);




