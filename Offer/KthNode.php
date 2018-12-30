<?php
declare(strict_types=1);

namespace App\Offer;

include_once '../Autoload.php';

/**
 * 给定一棵二叉搜索树，请找出其中的第k小的结点。例如， （5，3，7，2，4，6，8）    中，按结点数值大小顺序第三小结点的值为4。
 * Class KthNode
 * @package App\Offer
 */
class KthNode
{
    private $treeArr = [];

    // error
    public function run1(?TreeNode $treeNode, int $k): ?int
    {
        if (is_null($treeNode)) {
            return null;
        }

        $counter = 0;
        $target = $treeNode;
        do {
            $counter++;
        } while ($target = $target->left);

        if ($k > $counter) {
            return null;
        }

        $target = $treeNode;
        for ($i = 1; $i < $counter - $k + 1; $i++) {
            if ($target == null) {
                return null;
            }
            $target = $target->left;
        }

        if (is_null($target)) {
            return null;
        }

        return $target->val;
    }

    // 返回的是结点，而不是结点的值，审题不准，白白浪费时间
    public function run2(?TreeNode $treeNode, int $k): ?TreeNode
    {
        $treeArr = $this->traverseTree($treeNode);
        $count = count($treeArr);
        if(empty($count)){
            return null;
        }

        if($k <= 0 || $k > $count){
            return null;
        }

        return $treeArr[$k - 1];
    }

    private function traverseTree(?TreeNode $treeNode): array
    {
        if (is_null($treeNode)) {
            return [];
        }

        $left = $treeNode->left;
        $right = $treeNode->right;

        $leftArr = $this->traverseTree($left);
        $rightArr = $this->traverseTree($right);
        $treeArr = array_merge($leftArr, [$treeNode], $rightArr);

        return $treeArr;
    }
}

$class = new KthNode();
$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run1($treeNode1, 3);
var_dump($target);

$treeNode = null;
$target = $class->run1($treeNode, 3);
var_dump($target);

$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run1($treeNode1, 30);
var_dump($target);

$treeNode1 = new TreeNode(2);
$target = $class->run1($treeNode1, 1);
var_dump($target);

$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run1($treeNode1, 1);
var_dump($target);

$treeNode1 = new TreeNode(8);
$treeNode2 = new TreeNode(6);
$treeNode3 = new TreeNode(9);
$treeNode1->left = $treeNode2;
$treeNode1->right = $treeNode3;
$treeNode4 = new TreeNode(5);
$treeNode5 = new TreeNode(7);
$treeNode2->left = $treeNode4;
$treeNode2->right = $treeNode5;
$treeNode6 = new TreeNode(10);
$treeNode7 = new TreeNode(11);
$treeNode3->left = $treeNode6;
$treeNode3->right = $treeNode7;

$target = $class->run1($treeNode1, 1);
var_dump($target);

$class = new KthNode();
$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run1($treeNode1, 3);
var_dump($target);

$treeNode = null;
$target = $class->run1($treeNode, 3);
var_dump($target);

echo '<hr>';

$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run2($treeNode1, 30);
var_dump($target);

$treeNode1 = new TreeNode(2);
$target = $class->run2($treeNode1, 1);
var_dump($target);

$treeNode1 = new TreeNode(10);
$treeNode2 = new TreeNode(6);
$treeNode1->left = $treeNode2;
$treeNode3 = new TreeNode(2);
$treeNode4 = new TreeNode(8);
$treeNode2->left = $treeNode3;
$treeNode2->right = $treeNode4;
$treeNode5 = new TreeNode(1);
$treeNode6 = new TreeNode(3);
$treeNode3->left = $treeNode5;
$treeNode3->right = $treeNode6;
$treeNode7 = new TreeNode(7);
$treeNode8 = new TreeNode(8);
$treeNode4->left = $treeNode7;
$treeNode4->right = $treeNode8;
$target = $class->run2($treeNode1, 1);
var_dump($target);

$treeNode1 = new TreeNode(8);
$treeNode2 = new TreeNode(6);
$treeNode3 = new TreeNode(10);
$treeNode1->left = $treeNode2;
$treeNode1->right = $treeNode3;
$treeNode4 = new TreeNode(5);
$treeNode5 = new TreeNode(7);
$treeNode2->left = $treeNode4;
$treeNode2->right = $treeNode5;
$treeNode6 = new TreeNode(9);
$treeNode7 = new TreeNode(11);
$treeNode3->left = $treeNode6;
$treeNode3->right = $treeNode7;

$target = $class->run2($treeNode1, 4);
var_dump($target);

