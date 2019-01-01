<?php
declare(strict_types=1);

namespace App\Offer;

/**
 * 题意理解费力；复述费力；
 * 请设计一个函数，用来判断在一个矩阵中是否存在一条包含某字符串所有字符的路径。路径可以从矩阵中的任意一个格子开始，每一步可以在矩阵中向左，向
 * 右，向上，向下移动一个格子。如果一条路径经过了矩阵中的某一个格子，则之后不能再次进入这个格子。 例如 a b c e s f c s a d e e 这样的
 * 3 X 4 矩阵中包含一条字符串"bcced"的路径，但是矩阵中不包含"abcb"路径，因为字符串的第一个字符b占据了矩阵中的第一行第二个格子之后，路径不能
 * 再次进入该格子。
 * Class PathInMatrix
 * @package App\Offer
 */
class PathInMatrix
{
    private $index = 0;
    private $visited = [];

    public function hasPath(?array $matrix, int $rows, int $cols, ?string $path): bool
    {
        if (is_null($matrix) || $rows * $cols == 0 || is_null($path)) {
            return false;
        }

        $total = $rows * $cols;
        for ($i = 0; $i < $total; $i++) {
            $this->visited[$i] = false;
        }

        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col < $cols; $col++) {
                $bool = $this->isOK($matrix, $rows, $cols, $row, $col, $path);
                if ($bool) {
                    return true;
                }
            }
        }

        return false;
    }

    private function isOK(
        array $matrix,
        int $rows,
        int $cols,
        int $row,
        int $col,
        string $path
    ): bool
    {
        // 耗费时间比较多
        // 一定不能是 $this->index == strlen($path)-1
        if ($this->index == strlen($path)) {
            return true;
        }

        $bool = false;
        if (
            $row >= 0 && $row < $rows && $col >= 0 && $col < $cols
            && $matrix[$cols * $row + $col] == $path[$this->index]
            && $this->visited[$cols * $row + $col] == false
        ) {
            $this->index++;
            $this->visited[$cols * $row + $col] = true;

            $bool = $this->isOK($matrix, $rows, $cols, $row, $col - 1, $path)
                || $this->isOK($matrix, $rows, $cols, $row, $col + 1, $path)
                || $this->isOK($matrix, $rows, $cols, $row - 1, $col, $path)
                || $this->isOK($matrix, $rows, $cols, $row + 1, $col, $path);

            if (!$bool) {
                $this->index--;
                $this->visited[$cols * $row + $col] = false;
            }
        }

        return $bool;
    }
}

$class = new PathInMatrix();
$matrix = ['a', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'bcced';
$bool = $class->hasPath($matrix, 3, 4, $path);
var_dump($bool);

$class = new PathInMatrix();
$matrix = ['a', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'abcb';
$bool = $class->hasPath($matrix, 3, 4, $path);
var_dump($bool);

$class = new PathInMatrix();
$matrix = ['c', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'bcced';
$bool = $class->hasPath($matrix, 3, 4, $path);
var_dump($bool);