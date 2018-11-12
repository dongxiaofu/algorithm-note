<?php
declare(strict_types=1);

namespace App\Search\ST\Sequential;


class Node
{
    private $key;
    private $val;
    /** @var Node $next */
    private $next;

    public function __construct(string $key, string $val, ?Node $node)
    {
        $this->key = $key;
        $this->val = $val;
        $this->next = $node;
    }

    /**
     * @return Node
     */
    public function getNode(): Node
    {
        return $this->node;
    }

    /**
     * @param Node $node
     */
    public function setNode(Node $node): void
    {
        $this->node = $node;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return null | string
     */
    public function getVal(): ?string
    {
        return $this->val;
    }

    /**
     * @param null|string $val
     */
    public function setVal(?string $val): void
    {
        $this->val = $val;
    }

    /**
     * @return Node
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @param Node $next
     */
    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }
}