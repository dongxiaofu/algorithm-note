<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

class TreeIsBalancedSolutionV1
{
    public function isBalanced(?TreeNode $pRoot): bool
    {
        return $this->getTreeDepth($pRoot) != -1;
    }

    private function getTreeDepth(?TreeNode $pRoot): int
    {
        if (is_null($pRoot)) {
            return 0;
        }

        $left = $pRoot->left;
        $leftTreeDepth = $this->getTreeDepth($left);
        if ($leftTreeDepth == -1) {
            return -1;
        }

        $right = $pRoot->right;
        $rightTreeDepth = $this->getTreeDepth($right);
        if ($rightTreeDepth == -1) {
            return -1;
        }

        if (abs($leftTreeDepth - $rightTreeDepth) > 1) {
            return -1;
        } else {
            return ($leftTreeDepth > $rightTreeDepth ? $leftTreeDepth + 1 : $rightTreeDepth + 1);
        }
    }
}

$class = new TreeIsBalancedSolutionV1();
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

$class = new TreeIsBalancedSolutionV1();
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