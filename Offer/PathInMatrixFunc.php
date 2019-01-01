<?php
declare(strict_types=1);

$index = 0;
$visited = [];

function hasPath(?array $matrix, int $rows, int $cols, ?string $path): bool
{
    if (is_null($matrix) || $rows * $cols == 0 || is_null($path)) {
        return false;
    }

    global $visited;

    $total = $rows * $cols;
    for ($i = 0; $i < $total; $i++) {
        $visited[$i] = false;
    }

    for ($row = 0; $row < $rows; $row++) {
        for ($col = 0; $col < $cols; $col++) {
            if (isOK($matrix, $rows, $cols, $row, $col, $path)) {
                return true;
            }
        }
    }

    return false;
}

function isOK(array $matrix, int $rows, int $cols, int $row, int $col, ?string $path): bool
{
    global $index;
    global $visited;

    if ($index == strlen($path)) {
        return true;
    }

    $bool = false;
    if (
        $row >= 0 && $row < $rows
        && $col >= 0 && $col < $cols
        && $matrix[$cols * $row + $col] == $path[$index]
        && $visited[$cols * $row + $col] == false
    ) {
        $index++;
        $visited[$cols * $row + $col] = true;

        $bool = isOK($matrix, $rows, $cols, $row - 1, $col, $path)
            || isOK($matrix, $rows, $cols, $row + 1, $col, $path)
            || isOK($matrix, $rows, $cols, $row, $col - 1, $path)
            || isOK($matrix, $rows, $cols, $row, $col + 1, $path);

        if (!$bool) {
            $index--;
            $visited[$cols * $row + $col] = false;
        }
    }

    return $bool;
}

$matrix = ['a', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'bcced';
$bool = hasPath($matrix, 3, 4, $path);
var_dump($bool);

$index = 0;
$matrix = ['a', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'abcb';
$bool = hasPath($matrix, 3, 4, $path);
var_dump($bool);

$index = 0;
$matrix = ['c', 'b', 'c', 'e', 's', 'f', 'c', 's', 'a', 'd', 'e', 'e'];
$path = 'bcced';
$bool = hasPath($matrix, 3, 4, $path);
var_dump($bool);

$index = 0;
$matrix = ['A','B','C','E','S','F','C','S','A','D','E','E'];
$path = 'SEE';
$bool = hasPath($matrix, 3, 4, $path);
var_dump($bool);
