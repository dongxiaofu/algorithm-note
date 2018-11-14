<?php
declare(strict_types=1);

/**
 * 输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。
 * 1>若是负数，先求出它绝对值的二进制表示，然后加1
 * 2>再统计二进制表示中1的个数
 */

function NumberOf1($n)
{
    $count = 0;
    $flag = 1;

    echo '-5:' . decbin(-5) . '<br />';
    echo '5:' . decbin(5) . '<br />';

//    while($flag){
//        echo '<hr>';
//        echo 'n:' . decbin($n) . '<br />';
//        echo 'n len:' . strlen(decbin($n)) . '<br />';
//        echo 'flag:' . decbin($flag) . '<br />';
//        echo '<hr>';
//        $res = $n & $flag;
//        var_dump($res);
//        if($res){
////            echo $flag . '<br />';
//            $count++;
//        }
//        $flag = $flag << 1;
//    }
//
//    return $count;

    $count = 0;
    for($i = 0;$i <64;$i++){
        if(($n >> $i) & 1){
            $count++;
        }
    }
    return $count;
}

//$res = NumberOf1(5);
//var_dump($res);

$res = NumberOf1(-5);
var_dump($res);
//
//var_dump( -5 & 1);
//var_dump( -5 & 2);
//var_dump( -5 & 4);
//var_dump( -5 & 8);
//var_dump( -5 & 16);
//var_dump( -5 & 32);
//var_dump( -5 & 64);


//$flag = 1;
//$i = 0;
//while($flag){
//    $flag = $flag << 1;
//    echo $i . ':' . $flag . '<br />';
//    $i++;
//}