<?php
declare(strict_types=1);

namespace App\Stack;

require_once dirname(__DIR__) . '/Autoload.php';

class StackTest
{
    public static function main()
    {
        $stack = new Stack();

        echo 'empty:' . intval($stack->isEmpty()) . '<br />';
        echo 'size:' . $stack->size() . '<br />';
        var_dump($stack);

        $stack->push('hello');
        echo 'empty:' . intval($stack->isEmpty()) . '<br />';
        echo 'size:' . $stack->size() . '<br />';
        var_dump($stack);

        $stack->push('world');
        echo 'empty:' . intval($stack->isEmpty()) . '<br />';
        echo 'size:' . $stack->size() . '<br />';
        var_dump($stack);

        $stack->push('every');
        echo 'empty:' . intval($stack->isEmpty()) . '<br />';
        echo 'size:' . $stack->size() . '<br />';
        var_dump($stack);

        $item = $stack->pop();
        echo 'empty:' . intval($stack->isEmpty()) . '<br />';
        echo 'size:' . $stack->size() . '<br />';
        echo 'item:' . $item . '<br />';
        var_dump($stack);

    }
}

StackTest::main();