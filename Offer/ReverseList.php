<?php
declare(strict_types=1);

namespace App\Offer;

use App\Queue\Queue;

require_once dirname(__DIR__) . '/Autoload.php';

class ReverseList
{
    public function run1(Queue $queue): ?Queue
    {
        $reverseHead = null;
        $next = null;
        $pre = null;

        $node = $queue->getFirst();
        while($node != null){
            $next = $node->getNext();
            if($next == null){
                $reverseHead = null;
            }

            $node->setNext($pre);
            $pre = $node;
            $node = $next;
        }

        $queue->setFirst($pre);

        return $queue;
    }
}


// test
$r = new ReverseList();

$queue = new Queue();
$newQueue = $r->run1($queue);
var_dump($newQueue);

$queue = new Queue();
$queue->enqueue('a');
$newQueue = $r->run1($queue);
var_dump($newQueue);

$queue = new Queue();
$queue->enqueue('a');
$queue->enqueue('b');
$queue->enqueue('c');
$queue->enqueue('d');
$queue->enqueue('e');
$queue->enqueue('f');
$queue->printItems();
$newQueue = $r->run1($queue);
$queue->printItems();