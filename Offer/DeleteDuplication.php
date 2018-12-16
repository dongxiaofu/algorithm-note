<?php
declare(strict_types=1);

namespace App\Offer;


class Node
{
    var $val;
    var $next = NULL;

    function __construct($x)
    {
        $this->val = $x;
    }
}

/**
 * 在一个排序的链表中，存在重复的结点，请删除该链表中重复的结点，重复的结点不保留，返回链表头指针。 例如，链表1->2->3->3->4->4->5
 * 处理后为 1->2->5
 * Class DeleteDuplication
 * @package App\Offer
 */
class DeleteDuplication
{
    private $nodeValues = [];

    /**
     * 容易出错也是我耗费时间最多的地方：单链表当前结点的前一个结点的获取，不能是被删除的结点
     * 另外，小技巧：新增val为Null的头结点
     * 另外，如果打算笔算模拟程序执行，就要一次写清楚、执行正确
     * @param Node $pHead
     * @return Node|null
     */
    public function run1(Node $pHead): ?Node
    {

        $newPhead = new Node(NULL);
        $newPhead->next = $pHead;
        $cur = $newPhead;
        $prev = $newPhead;
        $vNums = $this->countV($pHead);
        while($cur){

            $v = $cur->val;
            $vNum = $vNums[$v] ?? 0;
            if($vNum >= 2){
                $prev->next = $cur->next;
                $prev = $prev;
            }else{
                $prev = $cur;
            }

            $cur = $cur->next;
        }

        return $newPhead->next;
    }

    private function countV(Node $pHead): array
    {
        $cur = $pHead;
        $data = [];
        while($cur){
            $val = $cur->val;
            if(isset($data[$val])){
                $data[$val] += 1;
            }else{
                $data[$val] = 1;
            }
            $cur = $cur->next;
        }

        return $data;
    }

    private function isExists(int $val): bool
    {
        foreach($this->nodeValues as $v){
            if($val == $v){
                return true;
            }
        }

        $this->nodeValues[] = $val;

        return false;
    }

    public function run2(Node $pHead): Node
    {
        $stack = new \SplStack();
        $cur = $pHead;
        while($cur){
            $val = $cur->val;
            $top = null;
            if($stack->count()){
                $topNode = $stack->top();
                $top = $topNode->val;

            }
            if($val == $top){
                $stack->pop();
            }else{
                $stack->push($cur);
            }
            $cur = $cur->next;
        }

        $top = null;
        while($stack->count() && $top = $stack->pop()){

        }

        return $top;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node43 = new Node(3);
$node54 = new Node(4);
$node64 = new Node(4);
$node75 = new Node(5);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node43;
$node43->next = $node54;
$node54->next = $node64;
$node64->next = $node75;

$cur = $node1;
while($cur){
    echo $cur->val . " ";
    $cur = $cur->next;
}

echo '<hr>';

$class = new DeleteDuplication();
$newPhead = $class->run1($node1);
$cur = $newPhead;
while($cur){
    var_dump($cur->val);
    $cur = $cur->next;
}

$newPhead = $class->run2($node1);
$cur = $newPhead;
while($cur){
    var_dump($cur->val);
    $cur = $cur->next;
}