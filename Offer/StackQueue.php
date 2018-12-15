<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 用两个栈来实现一个队列，完成队列的Push和Pop操作。 队列中的元素为int类型。
 * Class StackQueue
 * @package App\Offer
 */
class StackQueue
{
    private $stack1 = null;
    private $stack2 = null;

    public function __construct()
    {
        $this->stack1 = new \SplStack();
        $this->stack2 = new \SplStack();
    }

    /**
     * 留言遍历SplStack的方法，用current、next、rewind
     * @param int $item
     */
    public function push(int $item): void
    {
        $this->stack1->push($item);
        $this->stack1->rewind();
        $this->stack2 = new \SplStack();
        while($this->stack1->count() && $top = $this->stack1->current()){
            $this->stack2->push($top);
            $this->stack1->next();
        }
    }

    public function pop(): ?int
    {
        if($this->stack2->count() == 0){
            return null;
        }else{
            $top = $this->stack2->pop();
            $this->stack2->rewind();
            $this->stack1 = new \SplStack();
            while($this->stack2->count() && $cur = $this->stack2->current()){
                $this->stack1->push($cur);
                $this->stack2->next();
            }
            return $top;
        }

    }
}

// test
$class = new StackQueue();
$class->push(1);
$class->push(2);
$class->push(3);
$top = $class->pop();
var_dump($top);
$class->push(4);
$top = $class->pop();
var_dump($top);
$top = $class->pop();
var_dump($top);
$top = $class->pop();
var_dump($top);
$top = $class->pop();
var_dump($top);