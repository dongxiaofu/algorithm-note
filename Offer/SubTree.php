<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 此代码中的检测null条件，我完全不可能提前想到。
 * 输入两棵二叉树A，B，判断B是不是A的子结构。（ps：我们约定空树不是任意一个树的子结构）
 * Class SubTree
 * @package App\Offer
 */
class SubTree
{
    public function hasSubTree(?TreeNode $pRoot1, ?TreeNode $pRoot2): bool
    {
        if (is_null($pRoot1) || is_null($pRoot2)) {
            return false;
        }

        // 需要注意这里
        return $this->doesTree1HaveTree2($pRoot1, $pRoot2)
            || $this->hasSubTree($pRoot1->left, $pRoot2)
            || $this->hasSubTree($pRoot1->right, $pRoot2);
    }

    private function doesTree1HaveTree2(?TreeNode $pRoot1, ?TreeNode $pRoot2): bool
    {
        // 这些边界条件检测，我完全不可能提前想到
        if (is_null($pRoot2)) {
            return true;
        }

        if (is_null($pRoot1)) {
            return false;
        }

        if ($pRoot1->val != $pRoot2->val) {
            return false;
        }

        return $this->doesTree1HaveTree2($pRoot1->left, $pRoot2->left)
            && $this->doesTree1HaveTree2($pRoot1->right, $pRoot2->right);
    }
}

$class = new SubTree();
$node11 = new TreeNode(14);
$node12 = new TreeNode(1);
$node13 = new TreeNode(2);
$node14 = new TreeNode(3);
$node12->left = $node13;
$node12->right = $node14;
$node11->left = $node12;

$node21 = new TreeNode(1);
$node22 = new TreeNode(2);
$node23 = new TreeNode(3);
$node21->left = $node22;
$node21->right = $node23;

$bool = $class->hasSubTree($node11, $node21);
var_dump($bool);

$class = new SubTree();
$node11 = new TreeNode(4);
$node12 = new TreeNode(1);
$node13 = new TreeNode(2);
$node14 = new TreeNode(3);
$node12->left = $node13;
$node12->right = $node14;
$node11->left = $node12;

$node21 = null;

$bool = $class->hasSubTree($node11, $node21);
var_dump($bool);

$class = new SubTree();
$node11 = new TreeNode(1);
$node12 = new TreeNode(1);
$node13 = new TreeNode(2);
$node14 = new TreeNode(3);
$node12->left = $node13;
$node12->right = $node14;
$node11->left = $node12;

$node21 = null;

$bool = $class->hasSubTree($node11, $node21);
var_dump($bool);