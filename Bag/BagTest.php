<?php

namespace App\Bag;

require_once dirname(__DIR__) . '/Autoload.php';

class BagTest
{
    public static function main()
    {
        $bag = new Bag();
        echo "Is empty:" . (int)($bag->isEmpty()) . '<br />';
        $size = $bag->size();
        echo 'Size:' . $size . '<br />';

        $bag->add('hello');
        echo "Is empty:" . (int)($bag->isEmpty()) . '<br />';

        $size = $bag->size();
        echo 'Size:' . $size . '<br />';

        $bag->add('world');
        echo "Is empty:" . (int)($bag->isEmpty()) . '<br />';

        $size = $bag->size();
        echo 'Size:' . $size . '<br />';

        var_dump($bag);
    }
}

BagTest::main();