<?php
declare(strict_types=1);

namespace App\Bag;


class Bag
{
    private $first;
    private $size = 0;

    public function __construct()
    {
        $this->first = new Node();
    }

    public function add(string $item): void
    {
        $oldFirst = $this->first;

        $first = new Node();
        $first->setItem($item);
        $first->setNext($oldFirst);
        
        $this->first = $first;

        $this->size++;
    }

    public function isEmpty(): bool
    {
        return (0 == $this->size);
    }

    public function size(): int
    {
        $size = $this->size;

        return $size;
    }
}