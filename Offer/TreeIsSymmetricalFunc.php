<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

function isSymmetrical($pRoot)
{
    // write code here
    if (is_null($pRoot)) {
        return true;
    }

    $left = $pRoot->left;
    $right = $pRoot->right;

    return tree1AndTree2IsSymmetrical($left, $right);
}

function tree1AndTree2IsSymmetrical($left, $right)
{
    if (is_null($left) && is_null($right)) {
        return true;
    }

    if (is_null($left) || is_null($right)) {
        return false;
    }

    if ($left->val == $right->val) {
        return tree1AndTree2IsSymmetrical($left->left, $right->right)
            && tree1AndTree2IsSymmetrical($left->right, $right->left);
    }

    return false;

}

//$node0 = new TreeNode(0);
//$node11 = new TreeNode(11);
//$node12 = new TreeNode(12);
//$node0->left = $node11;
//$node0->right = $node12;
//$bool = isSymmetrical($node0);
//var_dump($bool);
//
//$node0 = new TreeNode(0);
//$node11 = new TreeNode(11);
//$node12 = new TreeNode(11);
//$node0->left = $node11;
//$node0->right = $node12;
//$bool = isSymmetrical($node0);
//var_dump($bool);

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

$bool = isSymmetrical($node0);
var_dump($bool);

$node0 = new TreeNode(8);
$node151 = new TreeNode(5);
$node152 = new TreeNode(5);
$node261 = new TreeNode(6);
$node272 = new TreeNode(7);
$node263 = new TreeNode(6);
$node274 = new TreeNode(7);

$node151->left = $node261;
$node151->right = $node272;

$node152->left = $node274;
$node152->right = $node263;

$node0->left = $node151;
$node0->right = $node152;

$bool = isSymmetrical($node0);
var_dump($bool);