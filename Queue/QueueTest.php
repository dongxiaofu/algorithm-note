<?php
declare(strict_types=1);

namespace App\Queue;

require_once dirname(__DIR__) . '/Autoload.php';

class QueueTest
{
    public static function main()
    {
        $queue = new Queue();

        echo 'empty:' . intval($queue->isEmpty()) . '<br />';
        echo 'size:' . $queue->size() . '<br />';
        var_dump($queue);

        $queue->enqueue('hello');
        echo 'empty:' . intval($queue->isEmpty()) . '<br />';
        echo 'size:' . $queue->size() . '<br />';
        var_dump($queue);

        $queue->enqueue('world');
        echo 'empty:' . intval($queue->isEmpty()) . '<br />';
        echo 'size:' . $queue->size() . '<br />';
        var_dump($queue);

        $queue->enqueue('world');
        echo 'empty:' . intval($queue->isEmpty()) . '<br />';
        echo 'size:' . $queue->size() . '<br />';
        var_dump($queue);

        $queue->delqueue();
        echo 'empty:' . intval($queue->isEmpty()) . '<br />';
        echo 'size:' . $queue->size() . '<br />';
        var_dump($queue);


    }
}

QueueTest::main();