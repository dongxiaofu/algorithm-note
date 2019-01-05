<?php
declare(strict_types=1);

namespace App\Offer;


class TreeLinkNode
{
    public $val;
    public $left = null;
    public $right = null;
    public $next = null;

    public function __construct($x)
    {
        $this->val = $x;
    }
}