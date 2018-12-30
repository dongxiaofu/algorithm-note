<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

function KthNode($pRoot, $k)
{
    // write code here
    if (is_null($pRoot)) {
        return null;
    }

    $counter = 0;
    $cur = $pRoot;
    while ($cur) {
        $counter++;
        $cur = $cur->left;
    }

    if ($k > $counter) {
        return null;
    }

    $target = $pRoot;
    for ($i = 1; $i < $counter - $k + 1; $i++) {
        if (is_null($target)) {
            return null;
        }
        $target = $target->left;
    }

    if (is_null($target)) {
        return null;
    }

    return $target;
}

$treeNode1 = new TreeNode(2);
$target = KthNode($treeNode1, 1);
var_dump($target);