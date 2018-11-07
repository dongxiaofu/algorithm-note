<?php
declare(strict_types=1);

namespace App\Stack\Priority;

use App\Tool;

class MaxPQ
{
    use Tool;

    /** @var DoubleNode null  */
    private $first = null;
    private $n = 0;

    public function insert(int $item): void
    {
        $node = new DoubleNode();
        $node->setItem($item);

        if($this->isEmpty()){
            $this->first = $node;
        }else{
            $oldFirst = $this->first;
            $node->setNext($oldFirst);
            $oldFirst->setPrevious($node);
            $this->first = $node;
        }

        $this->n++;
    }

    public function max(): ?DoubleNode
    {
        $max = null;
        $maxItem = 0;

        if($this->isEmpty()){
            return $max;
        }

        /** @var DoubleNode $first */
        $first = $this->first;
        do{
            if($this->less($maxItem, $first->getItem())){
                $maxItem = $first->getItem();
                $max = $first;
            }
            $first = $first->getNext();
        }while($this->hasNext($first));

        return $max;
    }

    public function delMax(): ?DoubleNode
    {
        $max = null;

        if($this->isEmpty()){
            return $max;
        }

        /** @var DoubleNode $max */
        $max = $this->max();

        // first
        // last
        // other
        if($max->getPrevious() == null){

            $next = $max->getNext();
            $this->first = $next;
            $next->setPrevious(null);

            $this->first = $next;

        }elseif($max->getNext() == null){

            $previous = $max->getPrevious();
            $previous->setNext(null);

        }else{
            $previous = $max->getPrevious();
            $next = $max->getNext();

            $previous->setNext($next);
            $next->setPrevious($previous);
        }

        $this->n--;

        return $max;
    }

    public function isEmpty(): bool
    {

        return ($this->first == null);
    }

    public function size(): int
    {
        return $this->n;
    }

    /**
     * @param DoubleNode $first
     * @return bool
     */
    private function hasNext($first): bool
    {
        return (null != $first->getNext());
    }


}