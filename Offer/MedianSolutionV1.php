<?php
declare(strict_types=1);

namespace App\Offer;


class MedianSolutionV1
{
    private $maxHeap = null;
    private $minHeap = null;

    public function __construct()
    {
        $this->maxHeap = new \SplMaxHeap();
        $this->minHeap = new \SplMinHeap();
    }

    public function insert(int $num): void
    {
        if ($this->minHeap->isEmpty() || $num > $this->minHeap->top()) {
            $this->minHeap->insert($num);
        } else {
            $this->maxHeap->insert($num);
        }

        if ($this->minHeap->count() == $this->maxHeap->count() + 2) {
            $this->maxHeap->insert($this->minHeap->extract());
        }

        if ($this->minHeap->count() + 1 == $this->maxHeap->count()) {
            $this->minHeap->insert($this->maxHeap->extract());
        }
    }

    public function getMedian()
    {
        if ($this->minHeap->count() == $this->maxHeap->count()) {
            return (($this->minHeap->top() + $this->maxHeap->top()) / 2);
        } else {
            return $this->minHeap->top();
        }
    }
}

$class = new MedianSolutionV1();
$class->insert(1);
$target = $class->getMedian();
var_dump($target);

$class = new MedianSolutionV1();
$class->insert(1);
$class->insert(2);
$target = $class->getMedian();
var_dump($target);

$class = new MedianSolutionV1();
$class->insert(1);
$class->insert(2);
$class->insert(3);
$target = $class->getMedian();
var_dump($target);