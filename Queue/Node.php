<?php

namespace App\Queue;


class Node
{
    /** @var string null  */
    private $item = null;
    /** @var Node null  */
    private $next = null;

    /**
     * @return string
     */
    public function getItem(): string
    {
        return $this->item;
    }

    /**
     * @param string $item
     */
    public function setItem(string $item): void
    {
        $this->item = $item;
    }

    /**
     * @return Node
     */
    public function getNext(): Node
    {
        return $this->next;
    }

    /**
     * @param Node $next
     */
    public function setNext(Node $next): void
    {
        $this->next = $next;
    }
}