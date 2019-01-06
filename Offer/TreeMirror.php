<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 操作给定的二叉树，将其变换为源二叉树的镜像。
 * Class TreeMirror
 * @package App\Offer
 */
class TreeMirror
{
    public function mirror(?TreeNode &$root): ?TreeNode
    {
        if (is_null($root)) {
            return null;
        }

        $left = $root->left;
        $this->mirror($left);
        $right = $root->right;
        $this->mirror($right);

        $root->left = $right;
        $root->right = $left;

        return $root;
    }
}

$class = new TreeMirror();
$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node1->left = $node2;
$node1->right = $node3;
$target = $class->mirror($node1);
var_dump($target);