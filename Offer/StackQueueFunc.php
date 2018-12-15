<?php
declare(strict_types=1);

$stack1 = new SplStack();
$stack2 = new SplStack();

/**
 * 在函数之间传递数据，可以使用全局变量，global。
 * 我连这都没有立刻想到。
 * 另外，对global的使用也生疏了。
 * 先全局声明变量，需局部使用的时候，在变量名前加上 global。
 * 注意，global $i = 4;这种写法是错误的。
 */



function mypush($node)
{
    // write code here

    global $stack1;
    global $stack2;
    $stack1->push($node);
    $stack1->rewind();
    $stack2 = new SplStack();
    while ($stack1->count() && $top = $stack1->current()) {
        $stack2->push($top);
        $stack1->next();
    }
}

function mypop()
{
    // write code here
    global $stack2;
    global $stack1;
    if ($stack2->isEmpty()) {
        return null;
    } else {
        $pop = $stack2->pop();
        $stack2->rewind();
        $stack1 = new SplStack();
        while($stack2->count() && $cur = $stack2->current()){
            $stack1->push($cur);
            $stack2->next();
        }

        return $pop;
    }
}

mypush(1);
mypush(2);
mypush(3);
$res = mypop();
var_dump($res);

$res = mypop();

mypush(4);
$res = mypop();
var_dump($res);
mypush(5);
$res = mypop();
var_dump($res);
$res = mypop();
var_dump($res);
