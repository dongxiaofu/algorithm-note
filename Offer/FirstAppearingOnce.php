<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 请实现一个函数用来找出字符流中第一个只出现一次的字符。例如，当从字符流中只读出前两个字符"go"时，第一个只出现一次的字符是"g"。当从该字符流中
 * 读出前六个字符“google"时，第一个只出现一次的字符是"l"。
 * Class FirstAppearingOnce
 * @package App\Offer
 */
class FirstAppearingOnce
{
    private $map = null;

    public function Init(): void
    {
        $this->map = [];
    }

    public function Insert(?string $ch): void
    {
        if (!empty($ch)) {
            if (isset($this->map[$ch])) {
                $this->map[$ch] = $this->map[$ch] + 1;
            } else {
                $this->map[$ch] = 1;
            }
        }
    }

    public function findFirstAppearingOnce(): string
    {
        $map = $this->map;
        foreach ($map as $k => $v) {
            if ($v == 1) {
                return $k;
            }
        }

        return '#';
    }
}

$class = new FirstAppearingOnce();
$class->Init();
$target = $class->findFirstAppearingOnce();
var_dump($target);

$class = new FirstAppearingOnce();
$class->Init();
$class->Insert(null);
$target = $class->findFirstAppearingOnce();
var_dump($target);

$class = new FirstAppearingOnce();
$class->Init();
$class->Insert('g');
$class->Insert('o');
$target = $class->findFirstAppearingOnce();
var_dump($target);

$class = new FirstAppearingOnce();
$class->Init();
$class->Insert('g');
$class->Insert('o');
$class->Insert('o');
$class->Insert('g');
$class->Insert('l');
$class->Insert('e');
$target = $class->findFirstAppearingOnce();
var_dump($target);