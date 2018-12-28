<?php
declare(strict_types=1);

namespace App\Offer;

class LNode
{
    public $val = null;
    public $next = null;

    public function __construct(int $val, ?LNode $next)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * 每年六一儿童节,牛客都会准备一些小礼物去看望孤儿院的小朋友,今年亦是如此。HF作为牛客的资深元老,自然也准备了一些小游戏。其中,有个游戏是这样
 * 的:首先,让小朋友们围成一个大圈。然后,他随机指定一个数m,让编号为0的小朋友开始报数。每次喊到m-1的那个小朋友要出列唱首歌,然后可以在礼品箱中任
 * 意的挑选礼物,并且不再回到圈中,从他的下一个小朋友开始,继续0...m-1报数....这样下去....直到剩下最后一个小朋友,可以不用表演,并且拿到牛客名贵
 * 的“名侦探柯南”典藏版(名额有限哦!!^_^)。请你试着想下,哪个小朋友会得到这份礼品呢？(注：小朋友的编号是从0到n-1)
 * Class LastRemainingSolution
 * @package App\Offer
 */
class LastRemainingSolution
{
    private const HEAD_VAL = 0;

    public function run1(int $n, int $m): int
    {
        $linkListHead = $this->createLinkList($n);
        if ($linkListHead->next == null) {
            return -1;
        }

        $cur = $linkListHead->next;
        $pre = $linkListHead;
        $counterM = self::HEAD_VAL;
        do {
            if ($m - 1 == $counterM && $cur->val != -1) {
                $pre->next = $cur->next;
                $counterM = self::HEAD_VAL;
                $pre = $pre;
            } else {
                if ($cur->val != -1) {
                    $counterM++;
                }

                $pre = $cur;
            }

            $cur = $cur->next;

        } while (!($pre->next->val == $cur->val && $cur->next->val == $pre->val));

        // 根据测试用例结果，写出来的
        if ($cur->val == -1) {
            return $cur->next->val;
        } else {
            return $cur->val;
        }
    }

    /**
     * @param int $n
     * @return LNode
     */
    private function createLinkList(int $n): LNode
    {
        $head = new LNode(-1, null);
        if ($n == 0) {
            return $head;
        }
        $pre = $head;
        $cur = null;
        for ($i = 0; $i < $n; $i++) {
            $cur = new LNode($i, null);
            $pre->next = $cur;
            $pre = $cur;
        }
        $cur->next = $head;

        return $head;
    }
}

$class = new LastRemainingSolution();
$val = $class->run1(5, 2);
var_dump($val);

$val = $class->run1(5, 3);
var_dump($val);

$val = $class->run1(45, 495);
var_dump($val);

$val = $class->run1(0, 0);
var_dump($val);