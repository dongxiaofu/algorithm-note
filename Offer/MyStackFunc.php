<?php
declare(strict_types=1);

/**
 * 简易快排，仍然不能熟练写出来。有了bug，不能心算debug。
 * 无法通过测试。
 * debug起来很麻烦。
 * 用纸和笔，我都不确定能准确计算出执行结果。
 * 再找机会用纸笔处理。
 */

$stack = new SplStack();

function mypush($node)
{
    // write code here
    global $stack;
    $arr = [];
    $stack->rewind();
    while ($stack->count() && $cur = $stack->current()) {
        $arr[] = $cur;
        $stack->next();
    }
    $arr[] = $node;
    $sortedArr = quickSort($arr);
    echo '-----------start----------<br />';
    var_dump($sortedArr);
    echo '------------end-----------<br />';
    $stack = new SplStack();
    $stack->rewind();
    foreach ($sortedArr as $v) {
        $stack->push($v);
    }
}

function mypop()
{
    // write code here
    global $stack;
    if ($stack->count()) {
        return $stack->pop();
    }

    return null;
}

function mytop()
{
    // write code here
    global $stack;
    if ($stack->isEmpty()) {
        return null;
    }

    return $stack->top();
}

function mymin()
{
    // write code here
    return mytop();
}

function quickSort($arr)
{
    if (empty($arr)) {
        return [];
    }

    $count = count($arr);
    if ($count == 1) {
        return [$arr[0]];
    }

    $flag = $arr[0];
    $left = [];
    $right = [];
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] > $flag) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left, [$flag], $right);
}


//mypush(1);
//mypush(2);
//mypush(-1);
//var_dump(mymin());
//mypush(9);
//var_dump(mymin());
//mypush(-3);
//var_dump(mymin());


//["PSH3","MIN","PSH4","MIN","PSH2","MIN","PSH3","MIN","POP","MIN","POP","MIN","POP","MIN","PSH0","MIN"]
mypush(3);      // +3
var_dump(mymin());   // d3
mypush(4);     // +4 => 3,4
var_dump(mymin());   // d3
mypush(2);     // +2 => 2,3,4
var_dump(mymin());   // d2
mypush(3);     // +3 => 2,3,3,4
var_dump(mymin());   // d2
var_dump(mypop());   // d 2 => 3,3,4
var_dump(mymin());   // d 3 => 3,3,4
var_dump(mypop());   // d 3 => 3,4
var_dump(mymin());   // d 3 => 3,4
var_dump(mypop());   // d 3 => 4
var_dump(mymin());   // d 4 => 4
mypush(0);    //  +0 => 0,4
var_dump(mymin());  // d 0 => 0,4

// 3,3,2,2,2,3,3,3,3,4,0

// 3,3,2,2,2,3,3,0
// 3,3,2,2,3,3,4,0
