<?php
declare(strict_types=1);

namespace App\Offer;


class MyListNode
{
    public $val = null;
    public $next = null;

    public function __construct($val)
    {
        $this->val = $val;
    }
}