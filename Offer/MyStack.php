<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 对象实例，是传值引用，在后续改变对象后，之前预想中的固定值，会发生变化。
 * 这导致链表循环引用或其他错误，解决办法是，尽量用临时变量保存对象实例。
 */

use App\Stack\Node;
use App\Stack\Stack;
use App\Tool;

require_once dirname(__DIR__) . '/Autoload.php';

class MyStack extends Stack
{
    use Tool;

    /** @var Node null */
    private $myFirst = null;
    /** @var Node null */
    private $myFirstMin = null;
    private $n = 0;

    function mypush(Node $node): void
    {
        // write code here
        if (is_null($this->myFirst)) {
            $this->myFirst = $node;
        } else {

            $tmp = $this->myFirst;
            $node->setNext($tmp);
            $this->myFirst = $node;
        }

        if (is_null($this->myFirstMin)) {
            $this->myFirstMin = $node;
        } else {
            if ($this->less($node->getItem(), $this->myFirstMin->getItem())) {
                $tmp3 = new Node();
                $tmp3->setItem($node->getItem());
                $tmp3->setNext($this->myFirstMin);
                $this->myFirstMin = $tmp3;
            } else {
                $tmp2 = new Node();
                $tmp2->setItem($this->myFirstMin->getItem());
                $tmp2->setNext($this->myFirstMin);
                $this->myFirstMin = $tmp2;
            }
        }

        $this->n++;
    }

    function mypop(): ?Node
    {
        // write code here
        $tmp = null;
        if (!is_null($this->myFirst)) {
            $tmp = $this->myFirst;
            $this->myFirst = $this->myFirst->getNext();
            $this->n--;
        }

        if (!is_null($this->myFirstMin)) {
            $this->myFirstMin = $this->myFirstMin->getNext();
        }

        return $tmp;
    }

    function mytop(): ?Node
    {
        // write code here

        if (is_null($this->myFirst)) {
            return null;
        }

        return $this->myFirst;
    }

    function mymin(): ?Node
    {
        // write code here
        if (is_null($this->myFirstMin)) {
            return null;
        }

        return $this->myFirstMin;
    }

    public function printItems(): void
    {
        $node = $this->myFirst;
        while ($node != null) {
            echo $node->getItem() . ' ';
            $node = $node->getNext();
        }
        echo '<hr>';
    }
}

$ms = new MyStack();
$node1 = new Node();
$node1->setItem('1');
$ms->mypush($node1);
$ms->printItems();
$node2 = new Node();
$node2->setItem('2');
$ms->mypush($node2);
$ms->printItems();
$node2 = new Node();
$node2->setItem('0');
$ms->mypush($node2);
$ms->printItems();
$node2 = new Node();
$node2->setItem('7');
$ms->mypush($node2);
$ms->printItems();

$tmp = $ms->mypop();
$min = $ms->mymin();
$ms->printItems();
var_dump($tmp->getItem(),$min->getItem());
$tmp = $ms->mypop();
$min = $ms->mymin();
$ms->printItems();
var_dump($tmp->getItem(),$min->getItem());
$tmp = $ms->mypop();
$min = $ms->mymin();
$ms->printItems();
var_dump($tmp->getItem(),$min->getItem());
