<?php
declare(strict_types=1);

/**
 * 先将链表放入栈里面，再遍历栈
 */

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}

// 算法复杂度未达标
function FindKthToTail(ListNode $head, int $k): ?ListNode
{
    // write code here
    $arr = [];
    for($i = $head; $i != null; $i = $head->next){
        array_unshift($arr, $i);
    }

    $res = $arr[$k-1] ?? null;

    return $res;
}

function FindKthToTail2(ListNode $head, int $k): ?ListNode
{
    // write code here
    $aheadNode = $head;
    $behindNode = $aheadNode;
    for($i=0; $i < $k; $i++){
        if(empty($behindNode)){
            return null;
        }
        $behindNode = $behindNode->next;
    }

    while($behindNode != null){
        $aheadNode = $aheadNode->next;
        $behindNode = $behindNode->next;
    }

    return $aheadNode;
}
