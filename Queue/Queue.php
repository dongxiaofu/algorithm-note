<?php
declare(strict_types=1);
namespace App\Queue;


class Queue
{
    /** @var Node null  */
    private $first = null;
    /** @var Node null  */
    private $last = null;
    private $n = 0;

    public function isEmpty(): bool
    {
        return ($this->first == null);
    }

    public function size(): int
    {
        return $this->n;
    }

    public function enqueue(string $item): void
    {
        $oldLast = $this->last;

        $node = new Node();
        $node->setItem($item);
        $this->last = $node;

        if($this->isEmpty()){
            $this->first = $this->last;
        }else{
            $oldLast->setNext($node);
        }

        $this->n++;
    }

    public function delqueue(): string
    {
        $oldFirst = $this->first;
        $this->first = $oldFirst->getNext();

        if($this->isEmpty()){
            $this->last = null;
        }

        $this->n--;

        $item = $oldFirst->getItem();

        return $item;
    }
}