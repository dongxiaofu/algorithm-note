<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 内存超限:您的程序使用了超过限制的内存
 * 输入一棵二叉树，判断该二叉树是否是平衡二叉树。
 * Class TreeIsBalancedSolution
 * @package App\Offer
 */
class TreeIsBalancedSolution
{
    public function isBalanced(?TreeNode $pRoot): bool
    {
        if (is_null($pRoot)) {
            return true;
        }

        $left = $pRoot->left;
        $right = $pRoot->right;

        if (is_null($left) || is_null($right)) {
            return true;
        }

        $leftDepth = $this->getTreeDepth($left);
        $rightDepth = $this->getTreeDepth($right);
        if (abs($leftDepth - $rightDepth) > 1) {
            return false;
        }

        // 消除这里的递归，可以减少内存占用
        $leftIsBalanced = $this->isBalanced($left);
        $rightIsBalanced = $this->isBalanced($right);

        return $leftIsBalanced && $rightIsBalanced;
    }

    private function getTreeDepth(?TreeNode $pRoot): int
    {
        if (is_null($pRoot)) {
            return 0;
        }

        $leftDepth = $this->getTreeDepth($pRoot->left);
        $rightDepth = $this->getTreeDepth($pRoot->right);

        return ($leftDepth > $rightDepth ? $leftDepth + 1 : $rightDepth + 1);
    }
}

$class = new TreeIsBalancedSolution();
$node01 = new TreeNode(1);

$node11 = new TreeNode(11);
$node12 = new TreeNode(12);
$node13 = new TreeNode(13);
$node11->left = $node12;
$node11->right = $node13;

$node21 = new TreeNode(21);
$node22 = new TreeNode(22);
$node23 = new TreeNode(23);
$node21->left = $node22;
$node21->right = $node23;

$node01->left = $node11;
$node01->right = $node21;

$bool = $class->isBalanced($node01);
var_dump($bool);

$class = new TreeIsBalancedSolution();
$node01 = new TreeNode(1);

$node11 = new TreeNode(11);
$node12 = new TreeNode(12);
$node13 = new TreeNode(13);
$node11->left = $node12;
$node11->right = $node13;

$node21 = new TreeNode(21);
$node22 = new TreeNode(22);
$node23 = new TreeNode(23);
$node21->left = $node22;
$node21->right = $node23;

$node31 = new TreeNode(31);
$node41 = new TreeNode(41);
$node31->left = $node41;
$node23->left = $node31;

$node01->left = $node11;
$node01->right = $node21;

$bool = $class->isBalanced($node01);
var_dump($bool);