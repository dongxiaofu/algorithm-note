<?php
declare(strict_types=1);

namespace App\Offer;

use App\Queue\Node;
use App\Queue\Queue;
use App\Tool;

require_once dirname(__DIR__) . '/Autoload.php';

class MergeList
{
    use Tool;

    public function run1(Queue $queue1, Queue $queue2): ?Queue
    {
        $node1 = $queue1->getFirst();
        $node2 = $queue2->getFirst();

        $q3 = new Queue();

        while($node1 || $node2){
            $item1 = null;
            $item2 = null;
           if($node1){
               $item1 = (int)$node1->getItem();
           }

            if($node2){
                $item2 = (int)$node2->getItem();
            }

            if( $item1 == null && $item2 == null){
                break;
            }

            if(is_numeric($item1) && is_numeric($item2)){
                if($this->less($item1, $item2)){
                    $q3->enqueue((string)$item1);
                    $node1 = $node1->getNext();
                }else{
                    $q3->enqueue((string)$item2);
                    $node2 = $node2->getNext();
                }

                continue;
            }

            if(is_numeric($item1)){
                $q3->enqueue((string)$item1);
                $node1 = $node1->getNext();
                continue;
            }

            if(is_numeric($item2)){
                $q3->enqueue((string)$item2);
                $node2 = $node2->getNext();
                continue;
            }

        }

        return $q3;
    }


    /**
     * 耗费许多时间，未通过，内存超过限制
     * @param Node|null $pHead1
     * @param Node|null $pHead2
     * @return Node|null
     */
    function run2(?Node $pHead1, ?Node $pHead2): ?Node
    {
        // write code here
        $node1 = $pHead1;
        $node2 = $pHead2;
        $pre = new Node();
        $head = null;

        while($node1 || $node2){

            if($head == null){
                $head = $pre;
            }

            if($node1 == null){
                if($node2 != null){
                    $pHead3 = new Node();
                    $pHead3->setItem($node2->getItem());
                    $pre->setNext($pHead3);
                    $node2 = $node2->getNext();
                    $pre = $pHead3;
                    continue;
                }
            }

            if($node2 == null){
                if($node1 != null){
                    $pHead3 = new Node();
                    $pHead3->setItem($node1->getItem());
                    $pre->setNext($pHead3);
                    $node1 = $node1->getNext();
                    $pre = $pHead3;
                    continue;
                }
            }

            $val1 = $node1->getItem();
            $val2 = $node2->getItem();
            if($val1 < $val2){
                $pHead3 = new Node();
                $pHead3->setItem($val1);
                $pre->setNext($pHead3);
                $node1 = $node1->getNext();
                $pre = $pHead3;
            }else{
                $pHead3 = new Node();
                $pHead3->setItem($val2);
                $pre->setNext($pHead3);
                $node2 = $node2->getNext();
                $pre = $pHead3;
            }
        }

        return $head;
    }

    public function run3(?Node $pHead1, ?Node $pHead2): ?Node
    {
        $head = null;

        if(is_null($pHead1)){
            return $pHead2;
        }

        if(is_null($pHead2)){
            return $pHead1;
        }

        if($pHead1->getItem() < $pHead2->getItem()){
            $head = $pHead1;
            $head->setNext($this->run3($pHead1->getNext(), $pHead2));
        }else{
            $head = $pHead2;
            $head->setNext($pHead2->getNext(), $pHead1);
        }

        return $head;
    }
}

// test
$ml = new MergeList();

$q1 = new Queue();
$q2 = new Queue();
$q3 = $ml->run1($q1, $q2);
$q3->printItems();

$q1 = new Queue();
$q1->enqueue('1');
$q2 = new Queue();
$q3 = $ml->run1($q1, $q2);
$q3->printItems();

$q1 = new Queue();
$q1->enqueue('1');
$q1->enqueue('2');
$q2 = new Queue();
$q3 = $ml->run1($q1, $q2);
$q3->printItems();

$q1 = new Queue();
$q1->enqueue('1');
$q1->enqueue('7');
$q1->enqueue('56');
$q1->printItems();
$q2 = new Queue();
$q2->enqueue('9');
$q2->enqueue('20');
$q2->enqueue('30');
$q2->printItems();
$q3 = $ml->run1($q1, $q2);
$q3->printItems();

echo '<hr>';
$q1 = new Queue();
$q1->enqueue('1');
$q1->enqueue('2');
$q1->enqueue('3');

$q2 = new Queue();
$q2->enqueue('4');
$q2->enqueue('5');
$q2->enqueue('6');

$pHead1 = $q1->getFirst();
$pHead2 = $q2->getFirst();
$q3 = $ml->run2($pHead1, $pHead2);
//var_dump($q3);
while($q3){
    echo $q3->getItem() . ' ';
    $q3 = $q3->getNext();
//    var_dump($q3);
}
echo '<hr>';

$q1 = new Queue();
$q1->enqueue('1');
$q1->enqueue('2');
$q1->enqueue('3');

$q2 = new Queue();
$q2->enqueue('4');
$q2->enqueue('5');
$q2->enqueue('6');

$pHead1 = $q1->getFirst();
$pHead2 = $q2->getFirst();
$q3 = $ml->run3($pHead1, $pHead2);
//var_dump($q3);
while($q3){
    echo $q3->getItem() . ' ';
    $q3 = $q3->getNext();
//    var_dump($q3);
}
echo '<hr>';
