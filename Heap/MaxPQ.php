<?php
declare(strict_types=1);

namespace App\Heap;

/**
 * Class MaxPQ
 * @package App\Heap
 * 1>下沉时的终止条件是什么？
 * * a>下沉失败
 *
 */
class MaxPQ
{
    private $pq = null;
    private $n = 0;

    public function __construct()
    {
        $this->pq = [null];
    }

    public function isEmpty(): bool
    {
        return ($this->n == 0 ? true : false);
    }

    public function size(): int
    {
        return $this->n;
    }

    public function insert(int $item): void
    {
        $k = $this->n + 1;
        $this->pq[$k] = $item;

        while($k){
            $k = $this->swim($k);
        }

        $this->n++;
    }

    public function delMax(): int
    {
        if ($this->isEmpty()) {
            throw new \Exception('队列为空', 0);
        }

        $max = $this->pq[1];
        $this->pq[1] = $this->pq[$this->n];
        $this->pq[$this->n] = null;

        $k = 1;
        while ($k) {

            $k = $this->sink($k);
        }

        $this->n--;

        return $max;
    }

    private function less(int $i, int $j): bool
    {
        $iv = $this->pq[$i] ?? 0;
        $jv = $this->pq[$j] ?? 0;

        return ($iv < $jv);
    }

    private function exch(int $i, int $j): void
    {
        if (isset($this->pq[$i]) && isset($this->pq[$j])) {
            $tmp = $this->pq[$i];
            $this->pq[$i] = $this->pq[$j];
            $this->pq[$j] = $tmp;
        }
    }

    private function swim($k): int
    {
        $parentIndex = 0;

        if (!isset($this->pq[$k])) {
            return $parentIndex;
        }

        $parentIndex = intval($k / 2);
        if (!isset($this->pq[$parentIndex])) {
            return $parentIndex;
        }

        /**
         * 这种绕口的判断，我很容易弄错
        if (!$this->less($parent, $currentNode)) {
            return false;
        }
         * */

        if($this->less($parentIndex, $k)){
            $this->exch($parentIndex, $k);

            return $parentIndex;
        }

        return $parentIndex;
    }

    private function sink($k): int
    {
        $sinkIndex = 0;

        if (!isset($this->pq[$k])) {
            return $sinkIndex;
        }

        $leftChildIndex = $k * 2;
        $rightChildIndex = $k * 2 + 1;
        if (!isset($this->pq[$leftChildIndex]) && !isset($this->pq[$rightChildIndex])) {
            return $sinkIndex;
        }

        if (isset($this->pq[$leftChildIndex]) && $this->less($k, $leftChildIndex)) {
            $this->exch($k, $leftChildIndex);
            return $leftChildIndex;
        } elseif (isset($this->pq[$rightChildIndex]) && $this->less($k, $rightChildIndex)) {
            $this->exch($k, $rightChildIndex);
            return $rightChildIndex;
        }

        return $sinkIndex;
    }
}