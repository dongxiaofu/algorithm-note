<?php
declare(strict_types=1);

namespace App\Stack;


class Stack
{
    /** @var Node null */
    private $first = null;
    private $n = 0;

    public function push(string $item): void
    {
        $oldFirst = $this->first;

        $node = new Node();
        $node->setItem($item);
        if(!$this->isEmpty()){
            $node->setNext($oldFirst);
        }


        $this->first = $node;

        $this->n++;
    }

    public function pop(): ?string
    {
        if($this->isEmpty()){
            return null;
        }

        $oldFirst = $this->first;
        $this->first = $oldFirst->getNext();

        $this->n--;

        $item = $oldFirst->getItem();

        return $item;
    }

    public function isEmpty(): bool
    {
        return ($this->first == null);
    }

    public function size(): int
    {
        return $this->n;
    }
}