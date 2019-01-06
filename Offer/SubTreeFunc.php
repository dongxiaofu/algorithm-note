<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 未能通过牛客网的测试，能通过自己写的测试用例。
 * 原因在HasSubTree中的case，极有可能是DoesTree1HaveTree2并非只是$pRoot1->val == $pRoot2->val时执行。
 * 因不知牛客网的测试用例，不方便调试
 */


function HasSubtree($pRoot1, $pRoot2)
{
    // write code here
    $result = false;
    if ($pRoot1 && $pRoot2) {
        if ($pRoot1->val == $pRoot2->val) {
            $result = DoesTree1HaveTree2($pRoot1, $pRoot2);

        } else {
            $result = HasSubtree($pRoot1->left, $pRoot2);
            if (!$result) {
                $result = HasSubtree($pRoot1->right, $pRoot2);
            }
        }
    }

    return $result;
}

function DoesTree1HaveTree2($pRoot1, $pRoot2)
{
    if (is_null($pRoot2)) {
        return true;
    }

    if (is_null($pRoot1)) {
        return false;
    }

    if ($pRoot1->val != $pRoot2->val) {
        return false;
    }

    return DoesTree1HaveTree2($pRoot1->left, $pRoot2->left)
        && DoesTree1HaveTree2($pRoot1->right, $pRoot2->right);
}

$node11 = new TreeNode(14);
$node12 = new TreeNode(1);
$node13 = new TreeNode(2);
$node14 = new TreeNode(33);
$node12->left = $node13;
$node12->right = $node14;
$node11->left = $node12;

$node21 = new TreeNode(1);
$node22 = new TreeNode(2);
$node23 = new TreeNode(3);
$node21->left = $node22;
$node21->right = $node23;

$bool = HasSubtree($node11, $node21);
var_dump($bool);
