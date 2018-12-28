<?php
declare(strict_types=1);


class Node
{
    public $val;
    public $next;

    public function __construct($val, $node)
    {
        $this->val = $val;
        $this->next = $node;
    }
}

function LastRemaining_Solution($n, $m)
{
    // write code here
    $head = CreateLinkList($n);
    if (is_null($head->next)) {
        return -1;
    }
    $pre = $head;
    $cur = $head->next;
    $countM = 0;
    do {
        if ($m - 1 == $countM && $cur->val != -1) {
            $pre->next = $cur->next;
            $pre = $pre;
            $countM = 0;
        } else {
            if ($cur->val != -1) {
                $countM++;
            }
            $pre = $cur;
        }
        $cur = $cur->next;
    } while (!($pre->next->val == $cur->val && $cur->next->val == $pre->val));

    if ($cur->val == -1) {
        return $pre->val;
    } else {
        return $cur->val;
    }
}

function CreateLinkList($n)
{
    $head = new Node(-1, null);
    if (empty($n)) {
        return $head;
    }
    $pre = $head;
    for ($i = 0; $i < $n; $i++) {
        $cur = new Node($i, null);
        $pre->next = $cur;
        $pre = $cur;
    }

    $cur->next = $head;

    return $head;
}

$n = LastRemaining_Solution(5, 2);
var_dump($n);

$n = LastRemaining_Solution(5, 3);
var_dump($n);

$n = LastRemaining_Solution(45, 495);
var_dump($n);

$n = LastRemaining_Solution(0, 0);
var_dump($n);