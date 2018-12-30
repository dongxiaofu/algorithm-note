<?php
declare(strict_types=1);

$minHeap = new SplMinHeap();
$maxHeap = new SplMaxHeap();

function Insert($num)
{
    global $minHeap;
    global $maxHeap;

    if ($maxHeap->isEmpty() || $num < $maxHeap->top()) {
        $maxHeap->insert($num);
    } else {
        $minHeap->insert($num);
    }

    if ($maxHeap->count() + 1 == $minHeap->count()) {
        $maxHeap->insert($minHeap->extract());
    }

    if ($maxHeap->count() == $minHeap->count() + 2) {
        $minHeap->insert($maxHeap->extract());
    }
}


function GetMedian()
{
    global $minHeap;
    global $maxHeap;

    if ($minHeap->count() == $maxHeap->count()) {
        return (($minHeap->top() + $maxHeap->top()) / 2);
    } else {
        return $maxHeap->top();
    }
}


Insert(1);
Insert(2);
Insert(3);
$target = GetMedian();
var_dump($target);