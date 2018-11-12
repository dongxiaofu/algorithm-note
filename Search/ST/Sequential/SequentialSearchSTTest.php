<?php
declare(strict_types=1);

namespace App\Search\ST\Sequential;

require_once dirname(dirname(dirname(__DIR__))) . '/Autoload.php';

class SequentialSearchSTTest
{
    public static function main()
    {
        $seq = new SequentialSearchST();
        $key = $seq->get('1');
        var_dump($key);

        $seq->put('1', 'hi');
        $key = $seq->get('1');
        var_dump($key);

        $seq->put('2', 'hi2');
        $key = $seq->get('2');
        var_dump($key);

        $seq->put('3', 'hi3');
        $key = $seq->get('3');
        var_dump($key);

        $seq->put('4', 'hi4');
        $key = $seq->get('4');
        var_dump($key);

        var_dump($seq->min());
        var_dump($seq->max());
        var_dump($seq->keys());
        $seq->deleteMin();
        var_dump($seq->keys());
        $seq->deleteMax();
        var_dump($seq->keys());
    }
}

SequentialSearchSTTest::main();