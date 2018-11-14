<?php
declare(strict_types=1);

namespace App\Search\ST\Sequential;


use App\Search\ST\ST;
use App\Tool;

class SequentialSearchST implements ST
{
    use Tool;

    /** @var Node $first  */
    private $first = null;

    public function put(string $key, string $val): bool
    {
        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($key == $x->getKey()){
                $x->setVal($val);
                return true;
            }
        }

        $this->first = new Node($key, $val, $this->first);

        return true;
    }

    public function get(string $key): ?string
    {
        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($key == $x->getKey()){
                return $x->getVal();
            }
        }

        return null;
    }

    public function delete(string $key): bool
    {
        for($x = $this->first; $x != null; $x = $x->getNext()){

            if($x->getKey() == $key){
                $this->first = $this->first->getNext();
                return true;
            }

            $xn = $x->getNext();
            if($xn == null){
                return true;
            }

            if($key == $xn->getKey()){

                $x->setNext($xn->getNext());
                return true;
            }
        }

        return true;
    }

    public function contains(string $key): bool
    {
        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($key == $x->getKey()){
                return true;
            }
        }

        return false;
    }

    public function isEmpty(): bool
    {
        return ($this->first == null);
    }

    public function size(): int
    {
        $n = 0;

        for($x = $this->first; $x != null; $x = $x->getNext()){
           $n++;
        }

        return $n;
    }

    public function min(): string
    {
        $mix = $this->first->getKey();

        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($this->less($x->getKey(), $mix)){
                $mix = $x->getKey();
            }
        }

        return $mix;
    }

    public function max(): string
    {
        $max = $this->first->getKey();

        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($this->less($max, $x->getKey())){
                $max = $x->getKey();
            }
        }

        return $max;
    }

    public function floor(string $key): ?string
    {
        if($this->first == null){
            return null;
        }

        if($this->first->getKey() == $key){
            return $key;
        }

        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($x->getNext()->getKey() > $key){
                $newKey = $x->getKey();
                return $newKey;
            }
        }

        return null;
    }

    public function ceiling(string $key): ?string
    {
        if($this->first == null){
            return null;
        }

        if($this->first->getKey() == $key){
            return $key;
        }

        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($x->getKey() > $key && $x->getNext() != null){
                $newKey = $x->getNext()->getKey();
                return $newKey;
            }
        }

        return null;
    }

    public function rank(string $key): int
    {
        $rank = 0;

        for($x = $this->first; $x != null; $x = $x->getNext()){
            $rank++;
        }

        return $rank;
    }

    public function select(int $k): ?string
    {
        $rank = 0;

        for($x = $this->first; $x != null; $x = $x->getNext()){
            if($rank == $k){
                return $x->getKey();
            }
            $rank++;
        }

        return null;
    }

    public function deleteMin(): void
    {
        $min = $this->min();
        $this->delete($min);
    }

    public function deleteMax(): void
    {
        $max = $this->max();
        $this->delete($max);
    }

    public function sizeOfChild(string $lo, string $hi): int
    {
        $n = 0;

        /** @var Node $x */
        for($x = $this->get($lo); $x != null && $x->getKey() <= $hi; $x = $x->getNext()){
           $n++;
        }

        return $n;
    }

    public function keysOfChild(string $lo, string $hi): ?array
    {
        $keys = [];

        /** @var Node $x */
        for($x = $this->get($lo); $x != null && $x->getKey() <= $hi; $x = $x->getNext()){
            $keys[] = $x->getKey();
        }

        return $keys;
    }

    public function keys(): ?array
    {
        #$keys = [];

        for($x = $this->first; $x != null; $x = $x->getNext()){
            $keys[] = $x->getKey();
        }

        return $keys;
    }




}