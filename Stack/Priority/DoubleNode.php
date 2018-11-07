<?php
declare(strict_types=1);

namespace App\Stack\Priority;

class DoubleNode
{
    /** @var DoubleNode null  */
    private $previous = null;
    /** @var int null  */
    private $item = null;
    /** @var DoubleNode null  */
    private $next = null;

    /**
     * @return DoubleNode
     */
    public function getPrevious(): ?DoubleNode
    {
        return $this->previous;
    }

    /**
     * @param DoubleNode $previous
     */
    public function setPrevious(?DoubleNode $previous): void
    {
        $this->previous = $previous;
    }

    /**
     * @return int
     */
    public function getItem(): int
    {
        return $this->item;
    }

    /**
     * @param int $item
     */
    public function setItem(int $item): void
    {
        $this->item = $item;
    }

    /**
     * @return DoubleNode
     */
    public function getNext(): ?DoubleNode
    {
        return $this->next;
    }

    /**
     * @param DoubleNode $next
     */
    public function setNext(?DoubleNode $next): void
    {
        $this->next = $next;
    }
}