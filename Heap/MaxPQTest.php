<?php
declare(strict_types=1);

namespace App\Heap;

require_once dirname(__DIR__) . '/Autoload.php';

class MaxPQTest
{
    public static function main()
    {
        $maxPQ = new MaxPQ();

        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($maxPQ);

        $maxPQ->insert(3);
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($maxPQ);

        $maxPQ->insert(-3);
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($maxPQ);

        $maxPQ->insert(5);
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($maxPQ);

        $maxPQ->insert(65);
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($maxPQ);

        $max = $maxPQ->delMax();
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($max);

        $max = $maxPQ->delMax();
        echo 'empty:' . intval($maxPQ->isEmpty()) . '<br />';
        echo 'size:' . $maxPQ->size() . '<br />';
        var_dump($max);
    }
}

MaxPQTest::main();