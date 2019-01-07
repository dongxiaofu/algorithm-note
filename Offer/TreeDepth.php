<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 输入一棵二叉树，求该树的深度。从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度。
 * Class TreeDepth
 * @package App\Offer
 */
class TreeDepth
{
    public function getTreeDepth(?TreeNode $root): int
    {
        if (is_null($root)) {
            return 0;
        }

        $leftDepth = $this->getTreeDepth($root->left);
        $rightDepth = $this->getTreeDepth($root->right);

        return ($leftDepth > $rightDepth ? $leftDepth + 1 : $rightDepth + 1);
    }
}

$class = new TreeDepth();
$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node2->left = $node4;
$node1->left = $node2;
$node1->right = $node3;
$depth = $class->getTreeDepth($node1);
var_dump($depth);
