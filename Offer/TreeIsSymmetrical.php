<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 二叉树的左右子结点相同，不等价于 二叉树与它的镜像相同，非充分、非必要条件。
 * 二叉树对折后若相同 是 二叉树与它的镜像相同 的充要条件。
 * 请实现一个函数，用来判断一颗二叉树是不是对称的。注意，如果一个二叉树同此二叉树的镜像是同样的，定义其为对称的。
 * Class TreeIsSymmetrical
 * @package App\Offer
 */
class TreeIsSymmetrical
{
    public function isSymmetrical(?TreeNode $pRoot): bool
    {
        if (is_null($pRoot)) {
            return false;
        }

        return $this->tree1AndTree2IsSymmetrical($pRoot->left, $pRoot->right);
    }

    private function tree1AndTree2IsSymmetrical(?TreeNode $pRoot1, ?TreeNode $pRoot2): bool
    {
        if (is_null($pRoot1) && is_null($pRoot2)) {
            return true;
        }

        if (is_null($pRoot1) || is_null($pRoot2)) {
            return false;
        }

        if ($pRoot1->val == $pRoot2->val) {
            return $this->tree1AndTree2IsSymmetrical($pRoot1->left, $pRoot2->right)
                && $this->tree1AndTree2IsSymmetrical($pRoot1->right, $pRoot2->left);
        }

        return false;
    }
}

$class = new TreeIsSymmetrical();
$node0 = new TreeNode(0);
$node11 = new TreeNode(11);
$node12 = new TreeNode(12);
$node0->left = $node11;
$node0->right = $node12;
$bool = $class->isSymmetrical($node0);
var_dump($bool);

$class = new TreeIsSymmetrical();
$node0 = new TreeNode(0);
$node11 = new TreeNode(11);
$node12 = new TreeNode(11);
$node0->left = $node11;
$node0->right = $node12;
$bool = $class->isSymmetrical($node0);
var_dump($bool);

$class = new TreeIsSymmetrical();
$node0 = new TreeNode(8);
$node151 = new TreeNode(5);
$node152 = new TreeNode(5);
$node261 = new TreeNode(6);
$node272 = new TreeNode(7);
$node273 = new TreeNode(7);
$node264 = new TreeNode(6);

$node151->left = $node261;
$node151->right = $node272;

$node152->left = $node273;
$node152->right = $node264;

$node0->left = $node151;
$node0->right = $node152;

$bool = $class->isSymmetrical($node0);
var_dump($bool);

$node0 = new TreeNode(8);
$node151 = new TreeNode(5);
$node152 = new TreeNode(5);
$node261 = new TreeNode(6);
$node262 = new TreeNode(6);
$node271 = new TreeNode(7);
$node272 = new TreeNode(7);

$node151->left = $node261;
$node151->right = $node262;

$node152->left = $node271;
$node152->right = $node272;

$node0->left = $node151;
$node0->right = $node152;

$bool = $class->isSymmetrical($node0);
var_dump($bool);
