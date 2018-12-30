<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 如何得到一个数据流中的中位数？如果从数据流中读出奇数个数值，那么中位数就是所有数值排序之后位于中间的数值。如果从数据流中读出偶数个数值，那么
 * 中位数就是所有数值排序之后中间两个数的平均值。我们使用Insert()方法读取数据流，使用GetMedian()方法获取当前读取数据的中位数。
 * Class MedianSolution
 * @package App\Offer
 */
class MedianSolution
{
    private $nums = [];

    public function insert(int $num): void
    {
        $nums = $this->nums;
        $count = count($nums);
        for($i = $count - 1; $i >= 0; $i--){
            if($nums[$i] <= $num){
                break;
            }else{
                $nums[$i+1] = $nums[$i];
            }
        }
        $nums[$i+1] = $num;
        $this->nums = $nums;
    }

    public function getMedian()
    {
        $nums = $this->nums;
        $count = count($nums);
        if(empty($count)){
            return null;
        }

        $start = 0;
        $end = $count - 1;

        $mod = $nums % 2;
        if($mod){
            $midRight = ($start + $end + 1) / 2;
            $midLeft = $midRight - 1;
            $target = ($nums[$midLeft] + $nums[$midRight]) / 2;
            return $target;
        }else{
            $mid = ($start + $end) / 2;
            return $nums[$mid];
        }
    }
}

$class = new MedianSolution();
$class->insert(1);
$target = $class->getMedian();
var_dump($target);

$class = new MedianSolution();
$class->insert(1);
$class->insert(2);
$target = $class->getMedian();
var_dump($target);
